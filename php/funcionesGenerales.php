<?php

function insertarEspacios($n) {
    for ($i = 0; $i < $n; $i++) {
        echo "<br/>";
    }
}

function mostrarNoticiasRelacionadas() {
    echo "
	<script src=\"http://code.jquery.com/jquery-1.8.2.js\"></script>
        <script src=\"/resources/demos/external/jquery.bgiframe-2.1.2.js\"></script>
        <script src=\"http://code.jquery.com/ui/1.9.1/jquery-ui.js\"></script>
        <link rel=\"stylesheet\" href=\"http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css\" />
        <script>
            function abrirDialogo() {
                $(\"#dialogo\").dialog({
                    show: \"drop\",
                    hide: \"fade\"
                });
            }
            ;
        </script>
        
        <div hidden id=\"dialogo\" title=\"Noticias relacionadas\">
            <p>Aquí aparecería un listado con enlaces a noticias relacionadas con ésta</p>
        </div>
";
}
?>
