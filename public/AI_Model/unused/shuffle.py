import pandas as pd

# Load the uploaded CSV file
file_path = 'usfd_ndt_dataset.csv'
data = pd.read_csv(file_path)

# Shuffle the rows of the DataFrame
shuffled_data = data.sample(frac=1).reset_index(drop=True)

# Save the shuffled DataFrame to a new CSV file
shuffled_file_path = 'shuffled_usfd_ndt_dataset.csv'
shuffled_data.to_csv(shuffled_file_path, index=False)

shuffled_file_path
