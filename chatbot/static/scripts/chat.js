var coll=document.getElementsByClassName("collapsible");
for(let i=0;i<coll.length;i++)
{
    coll[i].addEventListener("click",function(){
        this.classList.toggle("active");
        var content=this.nextElementSibling;
        if(content.style.maxHeight){
            content.style.maxHeight=null;
        }
        else{
            content.style.maxHeight=content.scrollHeight+"px";
        }
    });
}
function getTime()
{
    let today=new Date();
    let hours=today.getHours();
    let minutes=today.getMinutes();
    if(hours<10)
    {
        hours="0"+hours;
    }
    if(minutes<10)
    {
        minutes="0"+minutes;
    }
    let time=hours+":"+minutes;
    return time;
}
function firstBotMessage()
{
    let firstMessage="How is it going?"
    document.getElementById("botStarterMessage").innerHTML='<p class="botText" style="color:violet;"><span>'+firstMessage+'</span></p>';
    let time=getTime();
    document.getElementById("chat-timestamp").innerHTML=time;
    $("#chat-timestamp").append(time);
}
firstBotMessage();
function getHardResponse(userText)
{
    let userHtml='<p class="userText"><span>'+userText+'</span></p>';
    $("#textInput").val("");
    $("#chatbox").append(userHtml);
    let botResponse=getBotResponse(userText);
    let botHtml='<p class="botText"><span>'+botResponse+'</span></p>';
    $("#chatbox").append(botHtml);
    document.getElementById("chat-bar-bottom").scrollIntoView(true);
}
function getResponse()
{
    let userText=$("#textInput").val();
    if(userText=="")
    {
        userText="I love Code Paradise";
        userText=getHardResponse(userText);
    }
    else
    {
        userText=getHardResponse(userText);
    }
}
function buttonSendText(sampleText)
{
    let userHtml='<p class="userText"><span>'+sampleText+'</span></p>';
    $("#textInput").val("");
    $("#chatbox").append(userHtml);
    document.getElementById("chat-bar-bottom").scrollIntoView(true);
}
function sendButton()
{
    getResponse();
}
function heartButton()
{
buttonSendText("Heart clicked");
}
/*document.addEventListener("DOMContentLoaded",()=>{
    document.querySelector("#textInput").addEventListener("keydown",function(e){
        if(e.code==="Enter")
        {
            alert("code pressed");
        }
    });
});*/
$('#textInput').on('keydown',function (event){
    var keycode=event.which;
    if(keycode==="Enter")
    {
        alert("You pressed enter");
        getResponse();
    }
});
