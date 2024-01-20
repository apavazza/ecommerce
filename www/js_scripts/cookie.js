export function getCookie(name) {
    const cookieArray = document.cookie.split('; ');
    for (const cookie of cookieArray) {
      const [cookieName, cookieValue] = cookie.split('=');
      if (cookieName === name) {
        return cookieValue;
      }
    }
    return null;
}

export function removeCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

export function setCookie(name, value, daysToExpire) {
    const date = new Date();
    date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
  
    const expires = "expires=" + date.toUTCString();
    const sameSiteAttribute = "; SameSite= Strict";
    document.cookie = name + "=" + value + ";" + expires + ";path=/" + sameSiteAttribute;
}