const e = require('express');
var mysql = require('mysql');
var http = require('http');
var fs = require('fs');
const { response } = require('express');

function grabImage(url, filepath){
    return new Promise((resolve, reject)=>{
        http.get(url, (res)=>{
            if(res.statusCode == 200){
                res.pipe(fs.createWriteStream(filepath))
                    .on('error', reject)
                    .once('close', () => resolve(filepath));
            } else {
                res.resume();
                reject(new Error(`Request failed. Status code: ${res.statusCode}`));
            }
        })
    })
}

function getData(){
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "",
        database: "regio_personnel_2"
    });

    con.connect(function(err){
        if (err) throw err;

        var sql = "SELECT id FROM sys_data_scan WHERE flag_cam = '1' ORDER BY id DESC LIMIT 1";

        con.query(sql, function(err, result){
            if(err) throw err;
            if(result != ''){
                var id = result[0].id;
                var url = 'http://localhost/user-management/uad putih.png';
                // var update = "UPDATE sys_data_scan SET flag_cam = '0' WHERE id ="+id+" ORDER BY id DESC LIMIT 1";
                var update = "UPDATE sys_data_scan SET flag_cam = '0' WHERE id = "+id+" AND TIMESTAMPDIFF(SECOND, in_scan, NOW()) <=5;"
                
                grabImage(url, 'uploads/cam-photo/'+id+'.png')
                    .then(console.log)
                    .catch(console.error);
                con.query(update, function(err, result){
                    if (err) throw err;
                    console.log(result.affectedRows + " record(s) updated.");
                })
            }
        })
    });
}

setInterval(getData, 1000);