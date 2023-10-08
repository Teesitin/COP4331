<?php
require('contact.php');
require('db.php');
    function createContact($userID, $firstName, $lastName, $mobilePhone, $homePhone, $email)
    {
        global $db;
       
        $userID = $db->real_escape_string($userID);
        $firstName = $db->real_escape_string($firstName);
        $lastName = $db->real_escape_string($lastName);
        $mobilePhone = $db->real_escape_string($mobilePhone);
        $homePhone = $db->real_escape_string($homePhone);
        $email = $db->real_escape_string($email);
        
        $stmt = $db->prepare("INSERT INTO Contact (userID, firstName, lastName, mobilePhone, homePhone, email) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("isssss", $userID, $firstName, $lastName, $mobilePhone, $homePhone, $email);
        //$sql = "INSERT INTO CONTACTS (userID, firstName, lastName, mobilePhone, homePhone, email) VALUES ('$userID', '$firstName', '$lastName', '$mobilePhone', '$homePhone', '$email')";

        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    // Returns array of contact objects
    function retrieveContacts($userID)
    {
        global $db;
        $contacts = array();

        // Get contacts by ID of user that created them
        $stmt = $db->prepare("SELECT * FROM Contact WHERE userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            while ($row = $result->fetch_array(MYSQLI_NUM)) {
                $contact = new Contact(
                    $row['ID'],
                    $row['userID'],
                    $row['firstName'],
                    $row['lastName'],
                    $row['mobilePhone'],
                    $row['homePhone'],
                    $row['email']
                );
                array_push($contacts, $contact);
            }

        }

        return $contacts;
    }

    function deleteContact($userID, $contactID)
    {   
        global $db;
        $stmt = $db->prepare("DELETE FROM Contact WHERE userID = ? AND ID = ?");
        $stmt->bind_param("ii", $userID, $contactID);
    
        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    function updateContact($userID, $ID, $firstName, $lastName, $mobilePhone, $homePhone, $email)
    {   
        global $db;
        $firstName = $db->real_escape_string($firstName);
        $lastName = $db->real_escape_string($lastName);
        $mobilePhone = $db->real_escape_string($mobilePhone);
        $homePhone = $db->real_escape_string($homePhone);
        $email = $db->real_escape_string($email);

        $stmt = $db->prepare("UPDATE Contact SET firstName = ?, lastName = ?, mobilePhone = ?, homePhone = ?, email = ? WHERE userID = ? AND ID = ?");
        $stmt->bind_param("sssssii", $firstName, $lastName, $mobilePhone, $homePhone, $email, $userID, $ID);

        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    // Search by name
    // Returns array of contact objects
    function searchContacts($userID, $substring)
    {   
        global $db;
        $contacts = array();
        $userID = $db->real_escape_string($userID);
        $substring = $db->real_escape_string($substring);

        // Search for firstName or lastName that contains the substring
        $sql = "SELECT * FROM Contact WHERE userID=$userID AND (firstName LIKE '%$substring%' OR lastName LIKE '%$substring%')";
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

                array_push($contacts, $contact);
            }
        }

        return $contacts;
    }

?>