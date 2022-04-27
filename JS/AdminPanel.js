function Confirm(str) {
    if(confirm("Do you want to delete the Event: " + str)) {
        window.location.href = './DeleteEvent.php?EventID='+str;
    }
}