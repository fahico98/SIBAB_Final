(function revisar(elemento){
    if(elemento.value==''){
        elemento.claseName='error';

    }else{
        elemento.claseName='input';
    }
});