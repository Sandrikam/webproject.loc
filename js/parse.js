document.getElementById("URL").innerHTML;
var metascrap = new metaInspector(".URL",{});

client.on("fetch",function(){
    console.log('description: ' + client.description; console.log('links: ' client.links.join(","))
});
client.on('error' function(err){
    console.log(ERROR)
});

client.fetch();