$( document ).ready(function() {
    getSalary()
});

function ready() {
}

function getSalary()
{
    let myHeaders = new Headers();

    let myInit = { method: 'GET',
                headers: myHeaders,
                mode: 'cors',
                cache: 'default' };

    fetch(server+'/api/get-salary',myInit)
    .then(function(response) {
        return response.json();
    })
    .then(function(response) {
        fillHeader(response['meta']['header_special'], {'open':'<th>', 'close':'</th>'}, 'header-tr');
        fillRows(response['data'], {'open':'<td>', 'close':'</td>'}, 'body-table');
    });
}

function fillHeader(data, tag, id)
{
    let info = '';

    $('#'+id).html('');
    data.forEach(function(element, index, array) {
        info += tag['open']+element+tag['close'];
    });

    $('#'+id).html(info);
}

function fillRows(data, tag, id)
{
    data.forEach(function(element, index, array) 
    {
        let info = '';
        for(let x in element)
        {
            info += tag['open']+element[x]+tag['close'];
        }
        let node = $('<tr></tr>');
        node.html(info);
        $('#'+id).append(node);
    });
}