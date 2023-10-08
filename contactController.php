<?php

include('Contact.php');
    function createContact(mysqli $db, $userID, $firstName, $lastName, $mobilePhone, $homePhone, $email)
    {
        $userID = $db->real_escape_string($userID);
        $firstName = $db->real_escape_string($firstName);
        $lastName = $db->real_escape_string($lastName);
        $mobilePhone = $db->real_escape_string($mobilePhone);
        $homePhone = $db->real_escape_string($homePhone);
        $email = $db->real_escape_string($email);

        $sql = "INSERT INTO CONTACTS (userID, firstName, lastName, mobilePhone, homePhone, email) VALUES ('$userID', '$firstName', '$lastName', '$mobilePhone', '$homePhone', '$email')";

        if ($db->query($sql) === TRUE) {
            echo "Contact created successfully";
        } else {
            echo "Error creating contact: " . $db->error;
        }
    }

    // Returns array of contact objects
    function retrieveContacts(mysqli $db, $userID)
    {
        //global $db;
        $contacts = [];

        // Get contacts by ID of user that created them
        $sql = "SELECT * FROM CONTACTS WHERE userID = $userID";

        $result = $db->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $contact = new Contact(
                    $row['ID'],
                    $row['userID'],
                    $row['firstName'],
                    $row['lastName'],
                    $row['mobilePhone'],
                    $row['homePhone'],
                    $row['email']
                );
            }

            $contacts[] = $contact;//
        }

        return $contacts;
    }

    function deleteContact(mysqli $db, $userID, $ID)
    {
        $sql = "DELETE FROM CONTACTS WHERE userID = $userID AND ID = $ID";

        if ($db->query($sql) === TRUE) {
            echo "Contact deleted successfully";
        } else {
            echo "Error deleting contact: " . $db->error;
        }
    }

    function updateContact(mysqli $db, $userID, $ID, $firstName, $lastName, $mobilePhone, $homePhone, $email)
    {
        $firstName = $db->real_escape_string($firstName);
        $lastName = $db->real_escape_string($lastName);
        $mobilePhone = $db->real_escape_string($mobilePhone);
        $homePhone = $db->real_escape_string($homePhone);
        $email = $db->real_escape_string($email);

        $sql = "UPDATE CONTACTS SET firstName = '$firstName', lastName = '$lastName', mobilePhone = '$mobilePhone', homePhone = '$homePhone', email = '$email' WHERE userID = $userID AND ID = $ID";

        if ($db->query($sql) === TRUE) {
            echo "Contact updated successfully";
        } else {
            echo "Error updating contact: " . $db->error;
        }
    }

    // Search by name
    // Returns array of contact objects
    function searchContacts(mysqli $db, $userID, $substring)
    {
        $contacts = array();
        $substring = $db->real_escape_string($substring);

        // Search for firstName or lastName that contains the substring
        $sql = "SELECT * FROM CONTACTS WHERE userID = $userID AND firstName LIKE '%$substring%' OR lastName LIKE '%$substring%'";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contact = new Contact(
                    $row['ID'],
                    $row['userID'],
                    $row['firstName'],
                    $row['lastName'],
                    $row['mobilePhone'],
                    $row['homePhone'],
                    $row['email']
                );

                $contacts[] = $contact;//
            }
        }

        return $contacts;
    }

?>