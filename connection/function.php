<?php
include('connection.php');

//FUNCTION SHOW
function show($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//FUNCTION DATE
function datenow()
{
    date_default_timezone_set('Asia/Jakarta');
    echo date('D');
}

//FUNCTION CREATE CUSTOMERS
function create()
{
    global $conn;

    //DECLARATION ATTRIBUTE SQL
    $customerid = htmlspecialchars($_POST["id"]);
    $customername = !empty($_POST["nama"]) ? htmlspecialchars($_POST["nama"]) : NULL;
    $contact = !empty($_POST["kontak"]) ? htmlspecialchars($_POST["kontak"]) : NULL;
    $address = !empty($_POST["address"]) ? htmlspecialchars($_POST["address"]) : NULL;
    $latitude = !empty($_POST["latitude"]) ? htmlspecialchars($_POST["latitude"]) : NULL;
    $longitude = !empty($_POST["longitude"]) ? htmlspecialchars($_POST["longitude"]) : NULL;
    $snont = htmlspecialchars($_POST["snont"]);
    $bandwith = !empty($_POST["bw"]) ? htmlspecialchars($_POST["bw"]) : NULL;
    $packetService = !empty($_POST["packet"]) ? htmlspecialchars($_POST["packet"]) : NULL;
    $olt = !empty($_POST["olt"]) ? htmlspecialchars($_POST["olt"]) : NULL;

    //QUERY ADD CUSTOMERS

    //QUERY TABLE CUSTOMERS
    mysqli_query($conn, "INSERT INTO customers VALUES('$customerid','$customername','$contact','$address','$latitude','$longitude')");

    //QUERY TABLE ONT
    mysqli_query($conn, "INSERT INTO ont (SNONT,CustomerID,OLT) VALUES('$snont','$customerid','$olt')");

    //QUERY TABLE SERVICES
    mysqli_query($conn, "INSERT INTO services (CustomerID, SNONT, packetservice, Bandwith) VALUES('$customerid','$snont','$packetService','$bandwith')");

    return mysqli_affected_rows($conn);
}


//FUNCTION DELETE CUSTOMERS
function delete($customerid, $snont)
{
    global $conn;

    //QUERY DELETE DATA
    mysqli_query($conn, "DELETE FROM services");
    mysqli_query($conn, "DELETE FROM ont");
    mysqli_query($conn, "DELETE FROM customers");

    return mysqli_affected_rows($conn);
}

//FUNCTION EDIT CUSTOMERS
function update($getID)
{
    global $conn;

    //DECLARATION ATTRIBUTE SQL
    $customerid = htmlspecialchars($_POST["id"]);
    $customername = !empty($_POST["nama"]) ? htmlspecialchars($_POST["nama"]) : NULL;
    $contact = !empty($_POST["kontak"]) ? htmlspecialchars($_POST["kontak"]) : NULL;
    $address = !empty($_POST["address"]) ? htmlspecialchars($_POST["address"]) : NULL;
    $latitude = !empty($_POST["latitude"]) ? htmlspecialchars($_POST["latitude"]) : NULL;
    $longitude = !empty($_POST["longitude"]) ? htmlspecialchars($_POST["longitude"]) : NULL;
    $snont = htmlspecialchars($_POST["snont"]);
    $bandwith = !empty($_POST["bw"]) ? htmlspecialchars($_POST["bw"]) : NULL;
    $packetService = !empty($_POST["packet"]) ? htmlspecialchars($_POST["packet"]) : NULL;
    $olt = !empty($_POST["olt"]) ? htmlspecialchars($_POST["olt"]) : NULL;

    //QUERY UPDATE DATA
    mysqli_query($conn, "UPDATE customers join ont using(CustomerID) join services using(SNONT) SET customers.CustomerID = '$customerid' , CustomerName = '$customername', ont.SNONT = '$snont', packetservice = '$packetService', Bandwith = '$bandwith', Contact = '$contact', address = '$address', latitude = '$latitude', longitude = '$longitude', OLT = '$olt' WHERE customers.CustomerID = '$getID'");

    return mysqli_affected_rows($conn);
}

function searchCustomers($input){
    $search = "SELECT customers.customerid, customers.customername, customers.address, customers.contact, services.packetservice, services.bandwith, ont.olt, ont.snont FROM customers join ont using(customerid) join services using(SNONT) WHERE customers.customerid LIKE '%$input%' OR customers.customername LIKE '%$input%' OR customers.address LIKE '%$input%' OR customers.contact LIKE '%$input%' OR services.packetservice LIKE '%$input%' OR services.bandwith LIKE '%$input%' OR ont.olt LIKE '%$input%' OR ont.snont LIKE '%$input%' order by customers.customerid";

    return show($search);
}

function regis(){
    global $conn;

    $username = htmlspecialchars(stripslashes($_POST['username']));
    $password = htmlspecialchars(mysqli_escape_string($conn, $_POST["password"]));

    $result = mysqli_query($conn,"SELECT username FROM users WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
            alert('Username telah digunakan');
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_BCRYPT);

    mysqli_query($conn,"INSERT INTO users VALUES('$username','$password')");

    return mysqli_affected_rows($conn);
}

function getCountPacket($packet){
    return "SELECT count(packetservice) as jumlah FROM services WHERE packetservice = '$packet'";
}

function showCoordinat($packet){
    return "SELECT customername, latitude, longitude FROM customers JOIN services using(CustomerID) WHERE packetservice = '$packet'";
}
