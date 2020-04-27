function setDataTable(){
    $('#tblArusKas').DataTable({"order": [[ 1, "desc" ]]});
}

setTimeout(setDataTable, 100);