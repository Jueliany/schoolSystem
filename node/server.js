var express = require('express');
var app = express();
var cors = require('cors')
var fs = require('fs')
app.use(cors());
app.use(express.static('public'));
 app.use(cors({
    origin:['*'],
    methods:['GET','POST'],
    alloweHeaders:['Conten-Type', 'Access-Control-Allow-Headers']
}));

 app.post('/upload', function(req, res){
//接收前台POST过来的base64
 var body = "";
    req.on('data', function (chunk) {
        body += chunk; 
    });
    console.log(req.url);
    req.on('end', function (chunk) {
    	// console.log(body)
    	var imgData = body;
    	var fileName = imgData.split(";base64,")[0].split("image/")[1];
		//过滤data:URL
		var name = "pic"+(new Date()).valueOf();;
		var base64Data = imgData.replace(/^data:image\/\w+;base64,/, "");
		var dataBuffer = new Buffer(base64Data, 'base64');
		fs.writeFile("./img/"+name+"."+fileName , dataBuffer, function(err) {
		if(err){
            res.json({ resultCode: 1, message:"失败"})
		}else{
            res.json({ resultCode: 0, message:"成功", url: "/img/"+name+"."+fileName })
		}
		});
    })

		
});
app.get('/img/*', function (req, res) {
    res.sendFile( __dirname + "/" + req.url );
    console.log("Request for " + req.url + " received.");
})
 
var server = app.listen(5200, function () {
  console.log('Server running ');
})