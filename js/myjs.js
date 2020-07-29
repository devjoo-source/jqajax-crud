$(document).ready(function () {
    // Retrive db data for showing in table
    function getData() {
        $.ajax({
            type: "GET",
            url: "retrive.php",
            dataType: "json", //Data returns json objects
            success: function (response) {
                if (response) {
                    d = response;
                } else {
                    d = '';
                }
                n = 0;
                output = "";
                for (i = 0; i < d.length; i++) {
                    n++;
                    output += '<tr><td>' + n + '</td><td>' + d[i].name + '</td><td>' + d[i].email + '</td><td>' + d[i].pass + '</td><td><button id="edit" class="btn btn-sm mx-1 btn-info" data-uid="' + d[i].id + '">Edit</button><button id="dlt" class="btn btn-sm mx-1 btn-danger" data-uid="' + d[i].id + '">Delete</button></td></tr>';
                }
                $('tbody').html(output);
            }
        });
    }
    getData();

    // Insert data
    $('#myForm').on('submit', (e) => {
        e.preventDefault();
        let uid = $('#id').val();
        let nm = $('#name').val();
        let em = $('#email').val();
        let ps = $('#pass').val();
        // all inputs value store in object
        data = {
            id: uid,
            name: nm,
            email: em,
            pass: ps
        }

        $.ajax({
            type: "POST",
            url: "insert.php",
            data: JSON.stringify(data), //make json object from js object
            success: function (response) {
                // success message
                $('#warn').html("<div class='alert alert-success' role='alert'>" + response + "</div>").fadeOut(1000);
                // After submitting form will be clear
                $('#myForm')[0].reset();
                // Realtime result showing in table by the recalling retrive data function
                getData();
                // Set hidden input value empty for submitting new user
                $('#id').val('');
            }
        });
    });
    // edit process
    $('tbody').on('click', '#edit', function () {
        let = id = $(this).attr("data-uid");
        mydata = {
            uid: id
        };
        $.ajax({
            type: "POST",
            url: "edit.php",
            data: JSON.stringify(mydata), //make json object from js object
            dataType: "json",
            success: function (response) {
                if (response) {
                    d = response;
                } else {
                    d = "";
                }
                for (i = 0; i < d.length; i++) {
                    let id = $('#id').val(d[i].id);
                    let nm = $('#name').val(d[i].name);
                    let em = $('#email').val(d[i].email);
                    let ps = $('#pass').val(d[i].pass);
                }
            }
        });
    });
    // delete process
    $('tbody').on('click', '#dlt', function () {
        let id = $(this).attr('data-uid');
        mydata = {
            uid: id
        };
        mythis = $(this);
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: JSON.stringify(mydata), //make json object from js object
            dataType: "json",
            success: function (response) {
                if (response == 1) {
                    mythis.closest('tr').fadeOut();
                    $('#tblwarn').html("<div class='alert alert-warning' role='alert'>Successfuly Deleted!</div>").fadeOut(1000);
                } else if (response == 0) {
                    $('#tblwarn').html("<div class='alert alert-warning' role='alert'>Something is wrong try again!</div>").fadeOut(1000);
                }
            }
        });
    });
});