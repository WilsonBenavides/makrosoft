var tiposValidos = 
[
    'image/jpg',
    'image/jpeg',
    'image/png'
];

    function validarTipos( file ) {
        for( var i = 0; i < tiposValidos.length; i++ ) {
            if( file.type === tiposValidos[i] ) {
                return true;
            } 
        }
        return false;
    }

function onChange( event ) {
    var file = event.target.files[0];
    if( validarTipos( file ) ) {
        var tapaMiniatura = document.getElementById( 'tapaThumb' );
        tapaThumb.src = window.URL.createObjectURL( file );
    }
}