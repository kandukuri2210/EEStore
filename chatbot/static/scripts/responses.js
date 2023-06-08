function getBotResponse(input)
{
    if(input==="rock")
    {
        return "paper";
    }
    else if(input=="paper")
    {
        return "scissor";
    }
    else if(input=="scissor")
    {
        return "rock";

    }
    else if(input=="how are you?" || input=="hru" || input=="how r u")
    {
        return "I am an auto generated so I have no feelings, thank you!! How may I help you?";
    }
    else if(input=="how do you do")
    {
        return "how do you do";
    }
    else if(input=="What's up?" || input=="whats up")
    {
        return "Welcome to this site";
    }
    else if(input=="hello")
    {
        return "hello there!";
    }
    else if(input=="goodbye")
    {
        return "Talk to you later!";
    }
    else if(input=="goodmorning" || input=="gm")
    {
        return "good morning, How may I help you today?";
    }
    else if(input=="how to book my service?")
    {
        return "Go to Service Booking for electrical and electronic Products->Click on Account->Choose Users";
    }
    else if(input=="how to register my service?")
    {
        return "Go to Service Booking for electrical and electronic Products->Click on Account->Choose Service Provider->Register yourself";
    }
    else if(input=="I want my cab services to be booked into the portal")
    {
        return "Go to Packers and Movers Management System->Click on Contact Us->Drop a message";
    }
    else{
        return "Try asking something else";
    }
}