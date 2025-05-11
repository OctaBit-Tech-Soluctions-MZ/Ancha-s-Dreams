<?php

namespace App\Services;

use emagombe\Mpesa;

class MpesaService {

    private $mpesa;

    public function __construct()
    {
        $api_key = "972ub0jez0ln76coghu8adtqdt1bnvi5";		# Aqui introduz a api key disponibilizada no site
        $public_key = "MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAmptSWqV7cGUUJJhUBxsMLonux24u+FoTlrb+4Kgc6092JIszmI1QUoMohaDDXSVueXx6IXwYGsjjWY32HGXj1iQhkALXfObJ4DqXn5h6E8y5/xQYNAyd5bpN5Z8r892B6toGzZQVB7qtebH4apDjmvTi5FGZVjVYxalyyQkj4uQbbRQjgCkubSi45Xl4CGtLqZztsKssWz3mcKncgTnq3DHGYYEYiKq0xIj100LGbnvNz20Sgqmw/cH+Bua4GJsWYLEqf/h/yiMgiBbxFxsnwZl0im5vXDlwKPw+QnO2fscDhxZFAwV06bgG0oEoWm9FnjMsfvwm0rUNYFlZ+TOtCEhmhtFp+Tsx9jPCuOd5h2emGdSKD8A6jtwhNa7oQ8RtLEEqwAn44orENa1ibOkxMiiiFpmmJkwgZPOG/zMCjXIrrhDWTDUOZaPx/lEQoInJoE2i43VN/HTGCCw8dKQAwg0jsEXau5ixD0GUothqvuX3B9taoeoFAIvUPEq35YulprMM7ThdKodSHvhnwKG82dCsodRwY428kg2xM/UjiTENog4B6zzZfPhMxFlOSFX4MnrqkAS+8Jamhy1GgoHkEMrsT5+/ofjCx0HjKbT5NuA2V/lmzgJLl3jIERadLzuTYnKGWxVJcGLkWXlEPYLbiaKzbJb2sYxt+Kt5OxQqC1MCAwEAAQ==";	
        # Aqui introduz o public key disponibilizado no site
        $environment = "development";		# production/development

        # Inicialização e criação do objecto
        $this->mpesa = Mpesa::init($api_key, $public_key, $environment);
    }

    /**
     * Funcao responsavel por realizar transacoes online usando mpesa
     * Cliente para Negocio ou seja do cliente mpesa para o agente mpesa (Nossa App nesse caso)
     * @param double $value ex:200
     * @param integer $client ex: 84XXXXXX/85XXXXXXX
     * @param integer $agent ex: 12345 (opcional so no ambiente de desenvolvimento)
     */
    public function paymentC2B($value, $client, $agent = '171717') {
        $data = [
            "value" => $value,					# (Obrigatório) Valor a transferir
            "client_number" => $client,			# (Obrigatório) Número do cliente
            "agent_id" => $agent,				# (Obrigatório) Código do agente beneficiário
            "transaction_reference" => 1234547,		# (Obrigatório) Usando para atribuir uma referencia a transação
            "third_party_reference" => 33334,	# (Obrigatório) Esta referencia será usada para efectuar consulta das transações
        ];
        $response = $this->mpesa->c2b($data);

        return $response;
    }

    /**
     * Funcao responsavel por realizar transacoes online usando mpesa
     * Negocio para Cliente ou seja do agente mpesa (Nossa App nesse caso) para o cliente mpesa
     * @param $value ex:200
     * @param $client ex: 84XXXXXX/85XXXXXXX
     * @param $agent ex: 12345 (opcional so no ambiente de desenvolvimento)
     */
    public function paymentB2C($value, $client, $agent = '171717') {
        $data = [
            "value" => $value,					# (Obrigatório) Valor a transferir
            "client_number" => $client,			# (Obrigatório) Número do cliente
            "agent_id" => $agent,				# (Obrigatório) Código do agente beneficiário
            "transaction_reference" => 1234567,		# (Obrigatório) Usando para atribuir uma referencia a transação
            "third_party_reference" => 33333,	# (Obrigatório) Esta referencia será usada para efectuar consulta das transações
        ];
        $response = $this->mpesa->b2c($data);

        return $response;
    }

    /**
     * Funcao responsavel por realizar transacoes online usando mpesa
     * Negocio para Negocio ou seja do agente mpesa (Nossa App nesse caso) para o agente mpesa
     * @param $value ex:200
     * @param $agent_receiver ex: 12345 (opcional so no ambiente de desenvolvimento)
     * @param $agent ex: 12345 (opcional so no ambiente de desenvolvimento)
     */
    public function paymentB2B($value, $agent_receiver = '979797', $agent = '171717') {
        $data = [
            "value" => $value,					# (Obrigatório) Valor a transferir
            "agent_receiver_id" => $agent_receiver,			# (Obrigatório) Número do cliente
            "agent_id" => $agent,				# (Obrigatório) Código do agente beneficiário
            "transaction_reference" => 1234567,		# (Obrigatório) Usando para atribuir uma referencia a transação
            "third_party_reference" => 33333,	# (Obrigatório) Esta referencia será usada para efectuar consulta das transações
        ];
        $response = $this->mpesa->b2b($data);
    }

    public function status($transaction_id, $reference = '33333', $agent = 171717) {
        $data = [
            "transaction_id" => $transaction_id,		# (Obrigatório) Id da transação a reverter
            "agent_id" => $agent,			# (Obrigatório) Código do agente
            "third_party_reference" => $reference,	# (Obrigatório) Esta referencia será usada para efectuar consulta das transações
        ];
        $response = $this->mpesa->status($data);
        print_r($response);
    }

}