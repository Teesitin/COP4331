<?php

class ContactController
{
    private $servername = "localhost";
    private $username = "contact_man";
    private $password = "BxFj&Y4qd!Y6Mw";
    private $database = "cm_db";
    private $table = "contacts";
    protected $db;

    public function __construct()
    {
        // Create connection
        $this->db = new mysqli($this->servername, $this->username, $this->password, $this->database);

        // Check connection
        if ($this->db->connect_error)
            die("Connection failed: " . $this->db->connect_error);
    }

    // Create
    function createContact($firstName, $lastName, $mobilePhone, $homePhone, $email)
    {
        $firstName = $this->db->real_escape_string($firstName);
        $lastName = $this->db->real_escape_string($lastName);
        $mobilePhone = $this->db->real_escape_string($mobilePhone);
        $homePhone = $this->db->real_escape_string($homePhone);
        $email = $this->db->real_escape_string($email);

        $sql = "INSERT INTO " . $this->table . " (firstName, lastName, mobilePhone, homePhone, email) VALUES ('$firstName', '$lastName', '$mobilePhone', '$homePhone', '$email')";

        if ($this->db->query($sql) === TRUE) {
            echo "Contact created successfully";
        } else {
            echo "Error creating contact: " . $this->db->error;
        }
    }

    // Retrieve
    function retrieveContacts()
    {
        $contacts = array();

        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contacts[] = $row;
            }
        }

        return $contacts;
    }

    // Delete
    function deleteContact($ID)
    {
        $ID = $this->db->real_escape_string($ID);

        $sql = "DELETE FROM " . $this->table . " WHERE ID = $ID";

        if ($this->db->query($sql) === TRUE) {
            echo "Contact deleted successfully";
        } else {
            echo "Error deleting contact: " . $this->db->error;
        }
    }

    // Update
    function updateContact($ID, $firstName, $lastName, $mobilePhone, $homePhone, $email)
    {
        $ID = $this->db->real_escape_string($ID);
        $firstName = $this->db->real_escape_string($firstName);
        $lastName = $this->db->real_escape_string($firstName);
        $mobilePhone = $this->db->real_escape_string($mobilePhone);
        $homePhone = $this->db->real_escape_string($mobilePhone);
        $email = $this->db->real_escape_string($mobilePhone);

        $sql = "UPDATE " . $this->table . " SET firstName = '$firstName', lastName = '$lastName', mobilePhone = '$mobilePhone', homePhone = '$homePhone', email = '$email' WHERE ID = $ID";

        if ($this->db->query($sql) === TRUE) {
            echo "Contact updated successfully";
        } else {
            echo "Error updating contact: " . $this->db->error;
        }
    }

    // Search (by name)
    public function searchContacts($substring)
    {
        $contacts = array();
        $substring = $this->db->real_escape_string($substring);

        // Search for firstName or lastName that contains the substring
        $sql = "SELECT * FROM " . $this->table . " WHERE firstName LIKE '%$substring%' OR lastName LIKE '%$substring%'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contacts[] = $row;
            }
        }

        return $contacts;
    }
}
?>
