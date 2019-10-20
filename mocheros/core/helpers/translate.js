const lang = localStorage.getItem('languaje');

$(document).ready(function() {
    if (lang != null) {
        showTraslate(lang);
    } else {
        showTraslate('ES');
    }
})

function showTraslate(id) {
    $('.idioma').text(id);
    $('.lang').each(function(index, element) {
        $(this).text(arrLang[id][$(this).attr('key')]);
    })
}

function showEs() {
    showTraslate('ES');
    localStorage.setItem('languaje', 'ES');
}

function showEn() {
    showTraslate('EN');
    localStorage.setItem('languaje', 'EN');
}

function showEs2() {
    showTraslate('ES');
    localStorage.setItem('languaje', 'ES');
}

var arrLang = {
    'ES': {
        'inicio': 'Inicio',
        'productos': 'Productos',
        'login': 'Iniciar sesión',
        'buscar': 'Buscar',
        'cuenta': 'Mi cuenta',
        'sin-cuenta': '¿No tienes una cuenta?',
        'registrate': 'Registrate',
        'registrarse': 'Registrarse',
        'carrito': 'Carrito de compras',
        'ver-cuenta': 'Ver mi cuenta',
        'cambiar-clave': 'Cambiar contraseña',
        'cerrar-sesion': 'Cerrar sesión',
        'mochilas': 'MOCHILAS',
        'loncheras': 'LONCHERAS',
        'accesorios': 'ACCESORIOS',
        'bienvenido': '¡Bienvenido a Mocheros!',
        'productos': 'Nuestros productos',
        'slider1': 'Somos tus compañeros en todas tus aventuras.',
        'slider2': 'Las mejores mochilas a tu alcance',
        'slider3': 'Mochilas que puedes utilizar en cualquier momento',
        'slider4': 'Nuestras loncheras destacan por sus diseños y calidad',
        'slider5': 'Nuestras loncheras poseen los mejores diseños en el mercado',
        'slider6': '¡Las mejores loncheras para ti!',
        'slider7': 'Loncheras con diseños irresistibles',
        'slider8': 'Los mejores accesorios para toda ocasión',
        'slider9': 'Perfecto para la escuela, la universidad, el trabajo y muchas cosas más',
        'slider10': '¡Todos nuestros accesorios son elaborados para ti!',
        'slider11': 'Ponemos empeño y dedicación a cada producto que realizamos',
        'personalizamos': 'PERSONALIZAMOS TUS PRODUCTOS',
        'personalizado': 'Personalizamos nuestros productos a tu gusto, solo envianos tus diseños a nuestro correo contacto@mocheros.com y nosotros te responderemos lo más pronto posible.',
        'contactanos': 'Contáctanos',
        'correo': 'Correo electrónico',
        'telefono': 'Teléfono',
        'direccion': 'Dirección',
        'copyright': '© 2019 Derechos reservados a Mocheros S.A. de C.V.',
        'usuario': 'Nombre de usuario',
        'nombres': 'Nombres',
        'apellidos': 'Apellidos',
        'contrasena': 'Contraseña',
        'confirmar': 'Confirmar contraseña',
        'acepto': 'Acepto los',
        'terminos': 'términos y condiciones',
        'vermas': 'Ver más',
        'edit-profile': 'Editar perfil',
        'clave-actual': 'Contraseña actual',
        'clave-nueva': 'Nueva contraseña',
        'existencias': 'Existencias disponibles: ',
        'cantidad': 'Cantidad'
    },
    'EN': {
        'inicio': 'Home',
        'productos': 'Products',
        'login': 'Log in',
        'buscar': 'Search',
        'cuenta': 'My account',
        'sin-cuenta': 'Don´t have an account?',
        'registrate': 'Sign in',
        'registrarse': 'Register',
        'carrito': 'Shopping cart',
        'ver-cuenta': 'See my account',
        'cambiar-clave': 'Change password',
        'cerrar-sesion': 'Log out',
        'mochilas': 'BACKPACKS',
        'loncheras': 'LUNCHBOXES',
        'accesorios': 'ACCESORIES',
        'bienvenido': 'Welcome to Mocheros!',
        'productos': 'Our products',
        'slider1': 'We are your partners in all your aventures.',
        'slider2': 'Best backpacks at your reach',
        'slider3': 'Backpacks you can use at any time',
        'slider4': 'Our lunchboxes stand out by its desings and quality',
        'slider5': 'Our lunchboxes have the best desing in market',
        'slider6': 'Best lunchboxes just for you!',
        'slider7': 'Lunchboxes with irresistible designs',
        'slider8': 'Best accesories for every occasion',
        'slider9': 'Perfect for school, college, work and more',
        'slider10': 'All of our accesories are made for you!',
        'slider11': 'We put effort and dedication to every product we made',
        'personalizamos': 'WE CUSTOMIZE YOUR PRODUCTS',
        'personalizado': 'We customize your products at your preference, just sen us your desing at our email contacto@mocheros.com and we will reply you as soon as posible.',
        'contactanos': 'Contact us',
        'correo': 'Email',
        'telefono': 'Phone number',
        'direccion': 'Address',
        'copyright': '© 2019 Copyright Mocheros S.A. de C.V.',
        'usuario': 'Username',
        'nombres': 'First name',
        'apellidos': 'Last name',
        'contrasena': 'Password',
        'confirmar': 'Confirm password',
        'acepto': 'I agree the',
        'terminos': 'I agree the terms and conditions',
        'vermas': 'See  more',
        'editar-perfil': 'Edit profile',
        'clave-actual': 'Current password',
        'clave-nueva': 'New password',
        'existencias': 'Stock avaliable: ',
        'cantidad': 'Quantity'
    }
}