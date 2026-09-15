document.addEventListener('DOMContentLoaded', function() {
    const cookiePopup = document.getElementById('cookie-popup');
    const acceptCookies = document.getElementById('accept-cookies');
    const COOKIE_NAME = 'cookies_accepted';
    const COOKIE_EXPIRE_DAYS = 30; // Показывать раз в 30 дней
  
    // Проверяем, есть ли куки и не истек ли срок
    function checkCookie() {
      const cookies = document.cookie.split(';').map(c => c.trim());
      const cookie = cookies.find(c => c.startsWith(`${COOKIE_NAME}=`));
      
      if (!cookie) {
        cookiePopup.style.display = 'block';
      }
    }
  
    // Устанавливаем куки при нажатии "Принять"
    acceptCookies.addEventListener('click', function() {
      const expireDate = new Date();
      expireDate.setDate(expireDate.getDate() + COOKIE_EXPIRE_DAYS);
      
      document.cookie = `${COOKIE_NAME}=true; expires=${expireDate.toUTCString()}; path=/`;
      cookiePopup.style.display = 'none';
    });
  
    // Проверяем при загрузке страницы
    checkCookie();
  });