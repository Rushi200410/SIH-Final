import pandas as pd
import numpy as np
import joblib
from tensorflow.keras.models import load_model
import time
import matplotlib.pyplot as plt
from matplotlib.animation import FuncAnimation

# Load the trained model and scaler
model = load_model('track_defect_model.h5')
scaler = joblib.load('scaler.pkl')

# Initialize data storage
incoming_data_buffer = []

# Parameters for live plotting
window_size = 100  # Number of points visible on the graph at any time
initial_mode = True  # Flag to control the initial graph behavior

# Function to analyze incoming data
def analyze_signal(signal_data):
    # Scale the data
    scaled_data = scaler.transform([signal_data])

    # Predict defect
    prediction = model.predict(scaled_data)[0][0]
    return prediction > 0.5  # Returns True if defect detected

# Initialize the plot
fig, ax = plt.subplots(figsize=(12, 6))
x_data, y_data, defect_flags, defect_lines = [], [], [], []
line, = ax.plot([], [], label='Amplitude (0°)', color='blue')
defect_markers, = ax.plot([], [], 'ro', label='Detected Defect')  # Red markers for defects
defect_lines_plots = []

ax.set_xlim(0, window_size)
ax.set_ylim(-1, 1)  # Adjust based on expected amplitude range
ax.set_title("Real-Time Signal Analysis with AI Detection", fontsize=16)
ax.set_xlabel("Time (s)", fontsize=14)
ax.set_ylabel("Amplitude (0°)", fontsize=14)
ax.legend()

# Update function for the graph
def update(frame):
    global x_data, y_data, defect_flags, defect_lines, incoming_data_buffer, initial_mode

    # Simulate incoming data (replace with real sensor data)
    amplitude_0 = np.random.uniform(-1, 1)  # Replace with actual sensor data
    amplitude_45 = np.random.uniform(-1, 1)  # Replace with actual sensor data
    amplitude_70 = np.random.uniform(-1, 1)  # Replace with actual sensor data
    incoming_data = [amplitude_0, amplitude_45, amplitude_70]

    # Analyze and log data
    defect_detected = analyze_signal(incoming_data)
    incoming_data_buffer.append({
        'Amplitude (0°) (V)': amplitude_0,
        'Amplitude (45°) (V)': amplitude_45,
        'Amplitude (70°) (V)': amplitude_70,
        'Defect': int(defect_detected)
    })

    # Update graph data
    x_data.append(len(x_data))
    y_data.append(amplitude_0)
    defect_flags.append(defect_detected)

    line.set_data(x_data, y_data)

    # Handle defect markers
    defect_x = [x_data[i] for i in range(len(defect_flags)) if defect_flags[i]]
    defect_y = [y_data[i] for i in range(len(defect_flags)) if defect_flags[i]]
    defect_markers.set_data(defect_x, defect_y)

    # Add red dotted vertical line for defects
    for i, is_defect in enumerate(defect_flags):
        if is_defect and i not in defect_lines:
            defect_lines.append(i)
            defect_line = ax.axvline(x=i, color='red', linestyle='--', label='Defect Location')
            defect_lines_plots.append(defect_line)
            print(f"ALERT: Defect detected at index {i}, amplitude: {y_data[i]}")

    # Adjust the plot behavior after filling the window
    if len(x_data) > window_size:
        initial_mode = False

    if not initial_mode:
        # Scroll the graph forward
        ax.set_xlim(len(x_data) - window_size, len(x_data))

    return [line, defect_markers] + defect_lines_plots

# Set up animation
ani = FuncAnimation(fig, update, interval=1000)

# Continuous monitoring
def continuous_monitoring():
    while True:
        # Append data to CSV file
        if incoming_data_buffer:
            pd.DataFrame(incoming_data_buffer).to_csv(
                'real_time.csv', mode='a', header=False, index=False)
            incoming_data_buffer.clear()
        time.sleep(1)  # Simulate delay for real-time data

# Start the real-time graph and monitoring
from threading import Thread

monitoring_thread = Thread(target=continuous_monitoring, daemon=True)
monitoring_thread.start()

plt.show()
