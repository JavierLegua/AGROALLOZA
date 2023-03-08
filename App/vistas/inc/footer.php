

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?php echo RUTA_URL?>/public/js/main.js"></script>
<script>
        function confirm_delete(){
        if(confirm("Seguro que deseas eliminar el objeto?") === true){
            return true;
        }else{
            return false;
       }
     }
    </script>
</body>
</html>