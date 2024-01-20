import { setCookie, removeCookie, getCookie } from "/js_scripts/cookie.js";

const customerCookiePermanent = getCookie("customer_permanent");
if(customerCookiePermanent){
    setCookie("customer_session", customerCookiePermanent);
}

const customerCookieSession = getCookie("customer_session");

const rightButton1 = document.getElementById("sign-in-button");
const rightButton2 = document.getElementById("sign-up-button");

if(customerCookieSession){
    rightButton1.innerText = "Sign Out";
    rightButton1.setAttribute("href", "/");

    rightButton2.innerText = "My Account";
    rightButton2.setAttribute("href", "/customer/profile.php");

    rightButton1.addEventListener("click", function(){
        removeCookie("customer_session");
        removeCookie("customer_permanent");
    })
}