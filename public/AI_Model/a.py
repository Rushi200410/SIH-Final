import os
import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense
from tensorflow.keras.optimizers import Adam
from tensorflow.keras.models import load_model
import joblib

# Step 1: Load Dataset
print("Loading dataset...")
dataset_file = "real_time.csv"
data = pd.read_csv(dataset_file)

# Step 2: Data Preprocessing
print("Preprocessing data...")
data['d_amp_0'] = data['Amplitude (0°) (V)'].diff()
data['d_amp_45'] = data['Amplitude (45°) (V)'].diff()
data['d_amp_70'] = data['Amplitude (70°) (V)'].diff()

# Define threshold for defect detection
threshold_0 = 0.5
threshold_45 = 0.2
threshold_70 = 0.2

# Create binary defect labels
data['Defect'] = ((abs(data['d_amp_0']) > threshold_0) |
                  (abs(data['d_amp_45']) > threshold_45) |
                  (abs(data['d_amp_70']) > threshold_70)).astype(int)

# Handle missing values
data = data.ffill()

# Step 3: Feature Selection
features = data[['Amplitude (0°) (V)', 'Amplitude (45°) (V)', 'Amplitude (70°) (V)']]
labels = data['Defect']

# Step 4: Train-Test Split
X_train, X_test, y_train, y_test = train_test_split(features, labels, test_size=0.2, random_state=42)

# Step 5: Data Normalization
scaler = StandardScaler()
X_train = scaler.fit_transform(X_train)
X_test = scaler.transform(X_test)

# Save scaler for later use
scaler_file = 'scaler.pkl'
joblib.dump(scaler, scaler_file)

# Step 6: Model Training or Loading
model_file = 'track_defect_model.h5'
if os.path.exists(model_file):
    print("Loading existing model...")
    model = load_model(model_file)
    # Optional: Recompile the model to avoid warnings during evaluation
    model.compile(optimizer=Adam(learning_rate=0.001),
                  loss='binary_crossentropy',
                  metrics=['accuracy'])

    # Evaluate the model to build metrics and avoid warnings
    loss, accuracy = model.evaluate(X_test, y_test, verbose=0)
    print(f"Loaded model accuracy: {accuracy}")
else:
    print("Training new model...")
    model = Sequential([
        Dense(64, input_dim=X_train.shape[1], activation='relu'),
        Dense(32, activation='relu'),
        Dense(16, activation='relu'),
        Dense(1, activation='sigmoid')
    ])

    model.compile(optimizer=Adam(learning_rate=0.001),
                  loss='binary_crossentropy',
                  metrics=['accuracy'])

    model.fit(X_train, y_train,
              epochs=50,
              batch_size=32,
              validation_split=0.2,
              verbose=1)

    # Save model
    model.save(model_file)

# Step 7: AI Prediction on Entire Dataset
print("Making predictions...")
X_all = scaler.transform(features)
predictions = (model.predict(X_all) > 0.5).astype(int)  # Convert probabilities to binary labels
data['AI_Defect'] = predictions

# Step 8: Plot the Waveform with AI-Detected Defects
print("Plotting graph...")
waveform = data['Amplitude (0°) (V)']  # Use one channel for visualization
ai_defect_indices = data[data['AI_Defect'] == 1].index  # Indices of AI-detected defects

plt.figure(figsize=(14, 7))
plt.plot(waveform, label='Waveform (Amplitude)', color='blue')

# Highlight AI-detected defects
for defect in ai_defect_indices:
    plt.axvline(x=defect, color='red', linestyle='--', label='AI Detected Defect')

# Avoid duplicate labels in legend
handles, labels = plt.gca().get_legend_handles_labels()
unique_labels = dict(zip(labels, handles))
plt.legend(unique_labels.values(), unique_labels.keys())

# Add title and labels
plt.title("Waveform Plot with AI-Detected Defects", fontsize=16)
plt.xlabel("Sample Index", fontsize=14)
plt.ylabel("Amplitude (0°)", fontsize=14)

# Ensure the output directory exists
output_directory = 'public/graphs'
os.makedirs(output_directory, exist_ok=True)

# Save the plot as an image
output_image_path = os.path.join(output_directory, 'waveform_with_defects.png')
plt.tight_layout()
plt.savefig(output_image_path)
print(f"Graph saved as '{output_image_path}'")

# Step 9: Save Updated Dataset
updated_file = 'saved_model.csv'
if not os.path.exists(updated_file):
    data.to_csv(updated_file, index=False)
    print(f"Updated dataset saved as '{updated_file}'")
else:
    print(f"Dataset already exists as '{updated_file}'")
