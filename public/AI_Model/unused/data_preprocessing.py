import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
import joblib

# Load the dataset
data = pd.read_csv('dataset.csv')

# Strip whitespace from all string values in the dataset
data = data.apply(lambda col: col.map(lambda x: x.strip() if isinstance(x, str) else x))

# Replace "NULL" placeholders with actual NaN
data.replace("NULL", pd.NA, inplace=True)

# Handle missing values
data['Echo'] = data['Echo'].fillna(0).astype(float)  # Convert Echo to numeric
data['Defect position'] = data['Defect position'].fillna('Unknown')  # Fill with 'Unknown'

# Encode the target variable (presence of defect: 1 if Echo > 0, else 0)
data['Defect'] = data['Echo'].apply(lambda x: 1 if x > 0 else 0)

# Features (X) and target (y)
X = data[['amplitude', 'time']]  # Use numeric features for simplicity
y = data['Defect']

# Split the data
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Standardize features
scaler = StandardScaler()
X_train = scaler.fit_transform(X_train)
X_test = scaler.transform(X_test)

# Save the scaler for real-time use
joblib.dump(scaler, 'scaler.pkl')

# Save the preprocessed data to .npy files
np.save('X_train.npy', X_train)
np.save('X_test.npy', X_test)
np.save('y_train.npy', y_train)
np.save('y_test.npy', y_test)

print("Data preprocessing completed and files saved!")
