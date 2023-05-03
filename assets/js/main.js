function darkmode(){

    var dark = document.getElementById('dark-mode');

    // var leftside =document.getElementById('left');
    // var righttop =document.getElementById('right-top');
    // var rightdown =document.getElementById('right-down');
    // var mainleftPDA = document.getElementById('PDA');

    var SetTheme = document.body;
    SetTheme.classList.toggle("night")
    dark.classList.toggle("active");
    // leftside.classList.toggle("leftdark");
    // leftside.className = "leftdark";
    // righttop.className = "rightdark";
    // rightdown.className = "rightdark";
    // mainleftPDA.className = "main-leftClass";

    var theme;

    if(SetTheme.classList.contains("night")){
        console.log("Dark mode");
        theme = "DARK";
    }else{
        console.log("Light mode");
        theme = "LIGHT";
    }
    // save to localStorage
    localStorage.setItem("PageTheme", JSON.stringify(theme));
    // ensure you convert to JSON like i have done -----JSON.stringify(theme)
}

setInterval(() => {
    var dark= document.getElementById('dark-mode');
    let GetTheme = JSON.parse(localStorage.getItem("PageTheme"));
    // console.log(GetTheme);
    if(GetTheme === "DARK"){
         document.body.classList = "night";
        }else{
            document.body.classList = "";
    }
}, 5);