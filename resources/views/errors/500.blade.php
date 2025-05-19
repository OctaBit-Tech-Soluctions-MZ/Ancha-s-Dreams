@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Parece que houve um erro inesperado no nosso sistema. Não se preocupe, nossa equipe já foi
notificada (ou será em breve) e estamos trabalhando para resolver isso o mais rápido possível.
O que você pode fazer:
Voltar à página inicial ou tentar novamente em alguns instantes.
Se o problema persistir, entre em contato com o suporte.
Obrigado pela paciência!'))