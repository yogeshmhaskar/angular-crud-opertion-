var express = require("express");
var bodyParser = require("body-parser");

var app=express()

app.use(bodyParser.urlencoded({ extended: true }));
var MongoClient = require('mongodb').MongoClient
var ObjectId=require('mongodb').ObjectId

app.use((req, res, next) => {

    // Website you wish to allow to connect
    res.setHeader('Access-Control-Allow-Origin', '*');

    // Request methods you wish to allow
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');

    // Request headers you wish to allow
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');

    // Set to true if you need the website to include cookies in the requests sent
    // to the API (e.g. in case you use sessions)
    res.setHeader('Access-Control-Allow-Credentials', true);

    // Pass to next layer of middleware
    next();
});

app.get("/registration",function(req,res){
    MongoClient.connect('mongodb://localhost:27017/test',function(err,db){
        
    if (err) throw err
    else{

        db.collection('registration').find().toArray(function(err,result){
            if(err) throw err
            else{
                if(result){
                    res.json(result)
                        console.log(result)

                }else{
                    console.log(err)
                }
            }


        })
    }
})


})
app.post("/registration",function(req,res){

console.log(req.body)
    // MongoClient.connect('mongodb://localhost:27017/test',function(err,db){
    //         // console.log(db)
    //     if (err) throw err
    //     else{

    //         db.collection('registration').insertOne(req.body,function(err,result){
    //             if(err) throw err
    //             else{
    //                 if(result){
    //                         console.log(result)

    //                 }else{
    //                     console.log(err)
    //                 }
    //             }


    //         })
    //     }

    // })


})
app.listen(
    3000,
    () => console.log('Example app listening on port 3000!')
)