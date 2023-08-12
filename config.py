import ConfigParser, os

def read_config() :

    #log = logging.getLogger("root")

    #log.info("Reloading config")

    c = ConfigParser.SafeConfigParser(myDefaults)
    c.read("server.ini")

    values = {}

    for name, value in c.items("config") :
        values[name] = value

    return values

def save_config_value(key, value):
    file_path = 'server.ini'

    # Read the existing content of the file
    with open(file_path, 'r') as file:
        lines = file.readlines()

    # Check if the key already exists
    key_exists = False
    for i, line in enumerate(lines):
        if line.startswith(key + '='):
            # Key exists, replace the value
            lines[i] = key + '=' + value + '\n'
            key_exists = True
            break

    # If the key doesn't exist, add it as a new line
    if not key_exists:
        lines.append(key + '=' + value + '\n')

    # Write the modified content back to the file
    with open(file_path, 'w') as file:
        file.writelines(lines)
