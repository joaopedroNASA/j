<?php

foreach ($consultas as $consulta) {


    echo '<div class="card">';
    echo '<h4>Nome da consulta: ' . $consulta["nome_tarefa"] . "</h4>";
    echo '<li>Descrição da consulta:' . $consulta["descricao_tarefa"] . "</li>";
    echo '<li>Responsável da consulta: ' . $consulta["responsavel_tarefa"] . "</li>";
    echo '<li>Status da consulta: ' .  $consulta["status_tarefa"] . "</li>";
    echo '</div>';
}
