// host = '172.16.153.122';	// hostname or IP address
var buffData = "";
var gag = {};
startConnect();

function startConnect() {
  // Generate a random client ID
  clientID = "clientID-" + parseInt(Math.random() * 100000);
  // Fetch the hostname/IP address and port number from the form
  url = window.location.href.split("/");
  //host = url[3]
  host = location.hostname;
  port = "8083";
  client = new Paho.MQTT.Client(host, Number(port), clientID);
  // Set callback handlers
  client.onConnectionLost = onConnectionLost;
  client.onMessageArrived = onMessageArrived;
  var options = {
    useSSL: false,
    cleanSession: true,
    timeout: 3,
    onSuccess: onConnect,
    userName: "das",
    password: "mgi2023",
  };
  client.connect(options);
}
// Called when the client connects
function onConnect() {
  // Fetch the MQTT topic from the form
  topic = "DMS/#";
  client.subscribe(topic);
}

// Called when the client loses its connection
function onConnectionLost(responseObject) {
  //document.getElementById("messages").innerHTML = 'ERROR: Connection lost';
  console.log(responseObject.errorMessage);
  if (responseObject.errorCode !== 0) {
    console.log(responseObject.errorMessage);
  }
}

function onMessageArrived(message) {
  let page = $("#page").text();
  if (page == "monitor") {
    //	console.log(message);
    //message.payloadString;
    try {
      let dt = JSON.parse(message.payloadString);
      if (dt.dataType == "boolean") {
        if (dt.val == "True") {
          //console.log("ok");
          $(`.dt_${dt.alias}`).removeClass("btn-success");
          $(`.dt_${dt.alias}`).addClass("btn-danger");
        } else if (dt.val == "False") {
          $(`.dt_${dt.alias}`).removeClass("btn-danger");
          $(`.dt_${dt.alias}`).addClass("btn-success");
        }
      }
      $(`.val_${dt.alias}`).text(dt.val);
      //console.log(message.payloadString);
    } catch (error) {
      //console.log(error);
      console.log(message.payloadString);
    }
  }
}

function sendMessage(ia, tp) {
  mia = new Paho.MQTT.Message(ia);
  mia.destinationName = tp;
  client.send(mia);
}
// Called when the disconnection button is pressed
function startDisconnect() {
  client.disconnect();
  //document.getElementById("messages").innerHTML += '<span>Disconnected</span><br/>';
}
