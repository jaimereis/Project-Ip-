$(function () {

    $("#chart").insertFusionCharts({
        type: "pyramid",
        width: "100%",
        height: "350",
        dataFormat: "JSONURL",
        dataSource: "http://localhost/projetoIpe/ws/getTop10ClientesMaiorGasto"
    });

    function dtPickerAll() {
        $('.dt').datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
            dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });
    }
    ;

    dtPickerAll();

    $(document).ajaxStart(function () {
        Pace.restart();
    });


    function clearForm(form)
    {
        $(form).each(function () {
            this.reset();
        });
    }
    ;



    $("#cpf_cnpjAdd").on('keydown', function () {
        try {
            $("#cpf_cnpjAdd").unmask();
        } catch (e) {
        }

        var tamanho = $("#cpf_cnpjAdd").val().length;

        if (tamanho < 11) {
            $("#cpf_cnpjAdd").mask("999.999.999-99");
        } else if (tamanho >= 11) {
            $("#cpf_cnpjAdd").mask("99.999.999/9999-99");
        }

        // ajustando foco
        var elem = this;
        setTimeout(function () {
            // mudo a posição do seletor
            elem.selectionStart = elem.selectionEnd = 10000;
        }, 0);
        // reaplico o valor para mudar o foco
        var currentValue = $(this).val();
        $(this).val('');
        $(this).val(currentValue);
    });

    $("#cpf_cnpj").on('keydown', function () {
        try {
            $("#cpf_cnpj").unmask();
        } catch (e) {
        }

        var tamanho = $("#cpf_cnpj").val().length;

        if (tamanho < 11) {
            $("#cpf_cnpj").mask("999.999.999-99");
        } else if (tamanho >= 11) {
            $("#cpf_cnpj").mask("99.999.999/9999-99");
        }

        // ajustando foco
        var elem = this;
        setTimeout(function () {
            // mudo a posição do seletor
            elem.selectionStart = elem.selectionEnd = 10000;
        }, 0);
        // reaplico o valor para mudar o foco
        var currentValue = $(this).val();
        $(this).val('');
        $(this).val(currentValue);
    });




    $('#telefone1Add').mask('(00) 00000-0000', {placeholder: "(00) 00000-0000"});
    $('#telefone2Add').mask('(00) 00000-0000', {placeholder: "(00) 00000-0000"});
    $('#telefone1').mask('(00) 00000-0000', {placeholder: "(00) 00000-0000"});
    $('#telefone2').mask('(00) 00000-0000', {placeholder: "(00) 00000-0000"});
    $("input.dinheiro").maskMoney({showSymbol: false, symbol: "R$", decimal: ",", thousands: "."});

    if ($("div#getListaClientes").length) {
        FunGetListaClientes();
        function FunGetListaClientes() {
            $.getJSON("getAllClientes", function (data) {
                if (data == null) {
                    $('#getListaClientes').text('Fila vazia.');
                } else {
                    var content = "<table id='table' class='table table-bordered table-striped' >";
                    content += '<thead><tr><th>NM CLIENTE</th><th>CPF/CNPJ</th><th>E-MAIL</th><th>TELEFONE1</th><th>TELEFONE2</th><th></th></tr></thead>';
                    $.each(data, function (key, val) {
                        content += '<tr data-id="' + val.id + '">';
                        content += '<td>' + val.nome + '</td>';
                        content += '<td>' + val.cpf_cnpj + '</td>';
                        content += '<td>' + val.email + '</td>';
                        content += '<td>' + val.telefone1 + '</td>';
                        content += '<td>' + val.telefone2 + '</td>';
                        content += '<td><button class="btn btn-default btn-xs btnAcoes" href="">AÇÕES</button></td>';
                        content += '</tr>';
                    });
                    content += "</table>";
                    $('#getListaClientes').append(content);
                    $('#table').DataTable({

                        drawCallback: function () {
                            $('button.btnAcoes').unbind('click');
                            $('#table>tbody>tr>td>button.btnAcoes').on('click', function (e) {
                                e.preventDefault();
                                var id = $(this).closest('tr').data('id');
                                $('#myModalAcoes').data('id', id).modal('show');
                                getClienteId(id);
                                $('#id').val(id);
                                $('#myTab a[href="#tab1default"]').tab('show');

                            });
                        }
                    });
                }
            });
        }
        ;
    }
    ;

    if ($("div#getListaComunClientes").length) {
        FunGetListaClientes();
        function FunGetListaClientes() {
            $.getJSON("getAllClientes", function (data) {
                if (data == null) {
                    $('#getListaComunClientes').text('Fila vazia.');
                } else {
                    var content = "<table id='table' class='table table-bordered table-striped' >";
                    content += '<thead><tr><th>NM CLIENTE</th><th>CPF/CNPJ</th><th>E-MAIL</th><th>TELEFONE1</th><th>TELEFONE2</th></tr></thead>';
                    $.each(data, function (key, val) {
                        content += '<tr data-id="' + val.id + '">';
                        content += '<td>' + val.nome + '</td>';
                        content += '<td>' + val.cpf_cnpj + '</td>';
                        content += '<td>' + val.email + '</td>';
                        content += '<td>' + val.telefone1 + '</td>';
                        content += '<td>' + val.telefone2 + '</td>';
                        content += '</tr>';
                    });
                    content += "</table>";
                    $('#getListaComunClientes').append(content);
                    $('#table').DataTable({

                        drawCallback: function () {
                            $('button.btnAcoes').unbind('click');
                            $('#table>tbody>tr>td>button.btnAcoes').on('click', function (e) {
                                e.preventDefault();
                                var id = $(this).closest('tr').data('id');
                                $('#myModalAcoes').data('id', id).modal('show');
                                getClienteId(id);
                                $('#id').val(id);
                                $('#myTab a[href="#tab1default"]').tab('show');

                            });
                        }
                    });
                }
            });
        }
        ;
    }
    ;


    function getClienteId(id) {
        $.getJSON("getClienteId/" + id, function (data) {
            $('#nome').val(data[0]['nome']);
            $('#cpf_cnpj').val(data[0]['cpf_cnpj']);
            $('#email').val(data[0]['email']);
            $('#cep').val(data[0]['cep']);
            $('#localidade').val(data[0]['localidade']);
            $('#estado').val(data[0]['estado']);
            $('#logradouro').val(data[0]['logradouro']);
            $('#bairro').val(data[0]['bairro']);
            $('#numero').val(data[0]['numero']);
            $('#telefone1').val(data[0]['telefone1']);
            $('#telefone2').val(data[0]['telefone2']);
        });
    }
    ;

    $('#btnAddCliente').on('click', function () {
        $('#myModalAddCliente').modal('show');
    });

    $('#formAddCliente').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "adicionarCliente",
            async: false,
            data: {data: JSON.stringify($('#formAddCliente').serializeArray())},
            success: function (data)
            {
                $('#callback').html(data);
                setTimeout(function () {
                    $('#myModal').modal('show');
                }, 500);
                if ($('#msg').text() == 'Cliente cadastrado com sucesso!') {
                    clearForm('#formAddCliente');
                    $('#myModalAddCliente').modal('hide');
                    $('#table').dataTable().fnDestroy();
                    $('#table').remove();
                    FunGetListaClientes();
                }
            },
            error: function (data)
            {
                $('#callback_form').html(data);
                $('#myModal').modal('show');
            }
        });
    });

    $('#cepAdd').on('focusout', function () {
        consultaCepAdd($('#cepAdd').val());
    });
    function consultaCepAdd(cep) {
        $.getJSON("returnCep/" + cep, function (data) {
            $('#bairroAdd').val(data['bairro']);
            $('#logradouroAdd').val(data['logradouro']);
            $('#estadoAdd').val(data['uf']);
            $('#localidadeAdd').val(data['localidade']);
        });
    }
    ;

    $('#cep').on('focusout', function () {
        consultaCep($('#cep').val());
    });
    function consultaCep(cep) {
        $.getJSON("returnCep/" + cep, function (data) {
            $('#bairro').val(data['bairro']);
            $('#logradouro').val(data['logradouro']);
            $('#estado').val(data['uf']);
            $('#localidade').val(data['localidade']);
        });
    }
    ;


    $('#formEditCliente').on('submit', function (e) {
        e.preventDefault();
        var id = $('#myModalAcoes').data('id');
        $('#myModalAcoes').modal('hide');
        $.ajax({
            type: "POST",
            url: "atualizarCliente",
            async: false,
            data: {data: JSON.stringify($('#formEditCliente').serializeArray())},
            success: function (data)
            {
                $('#callback').html(data);
                setTimeout(function () {
                    $('#myModal').modal('show');
                }, 500);
                if ($('#msg').text() == 'Cliente atualizado com sucesso!') {
                    clearForm('#formEditCliente');
                    $('#myModalAddCliente').modal('hide');
                    $('#table').dataTable().fnDestroy();
                    $('#table').remove();
                    FunGetListaClientes();
                }
            },
            error: function (data)
            {
                $('#callback_form').html(data);
                $('#myModal').modal('show');
            }
        });
    });

    $('#inativarCliente').on('click', function (e) {
        e.preventDefault();
        var id = $('#myModalAcoes').data('id');
        $('#myModalAcoes').modal('hide');
        var obj = {"id": id};
        $.ajax({
            type: "POST",
            url: "inativarCliente",
            async: false,
            data: {data: JSON.stringify(obj)},
            success: function (data)
            {
                $('#callback').html(data);
                setTimeout(function () {
                    $('#myModal').modal('show');
                }, 500);
                if ($('#msg').text() == 'Cliente removido com sucesso!') {
                    $('#myModalAddCliente').modal('hide');
                    $('#table').dataTable().fnDestroy();
                    $('#table').remove();
                    FunGetListaClientes();
                }
            },
            error: function (data)
            {
                $('#callback_form').html(data);
                $('#myModal').modal('show');
            }
        });
    });

    if ($("div#getListaProdutos").length) {
        FunGetListaProdutos();
        function FunGetListaProdutos() {
            $.getJSON("getAllProdutos", function (data) {
                if (data == null) {
                    $('#getListaProdutos').text('Fila vazia.');
                } else {
                    var content = "<table id='table' class='table table-bordered table-striped' >";
                    content += '<thead><tr><th>ID</th><th>REFERÊNCIA</th><th>DESCRIÇÃO</th><th>MARCA</th><th>PREÇO</th><th>ESTOQUE</th><th>UNIDADE VENDA</th><th></th></tr></thead>';
                    $.each(data, function (key, val) {
                        content += '<tr data-id="' + val.id + '">';
                        content += '<td>' + val.id + '</td>';
                        content += '<td>' + val.referencia + '</td>';
                        content += '<td>' + val.descricao + '</td>';
                        content += '<td>' + val.marca + '</td>';
                        content += '<td>' + val.preco + '</td>';
                        content += '<td>' + val.estoque + '</td>';
                        content += '<td>' + val.unidade_de_venda + '</td>';
                        content += '<td><button class="btn btn-default btn-xs btnAcoes" href="">AÇÕES</button></td>';
                        content += '</tr>';
                    });
                    content += "</table>";
                    $('#getListaProdutos').append(content);
                    $('#table').DataTable({

                        drawCallback: function () {
                            $('button.btnAcoes').unbind('click');
                            $('#table>tbody>tr>td>button.btnAcoes').on('click', function (e) {
                                e.preventDefault();
                                var id = $(this).closest('tr').data('id');
                                $('#myModalAcoes').data('id', id).modal('show');
                                getProdutoId(id);
                                $('#id').val(id);
                                $('#myTab a[href="#tab1default"]').tab('show');

                            });
                        }
                    });
                }
            });
        }
        ;
    }
    ;

    $('#btnAddProduto').on('click', function () {
        $('#myModalAddProduto').modal('show');
    });

    $('#formAddProduto').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "adicionarProduto",
            async: false,
            data: {data: JSON.stringify($('#formAddProduto').serializeArray())},
            success: function (data)
            {
                $('#callback').html(data);
                $('#myModalAddProduto').modal('hide');
                setTimeout(function () {
                    $('#myModal').modal('show');
                }, 500);
                if ($('#msg').text() == 'Produto cadastrado com sucesso!') {
                    clearForm('#formAddProduto');
                    $('#table').dataTable().fnDestroy();
                    $('#table').remove();
                    FunGetListaProdutos();
                }
            },
            error: function (data)
            {
                $('#callback_form').html(data);
                $('#myModal').modal('show');
            }
        });
    });

    $("input.preco").maskMoney({showSymbol: false, symbol: "R$", decimal: ",", thousands: "."});

    function getProdutoId(id) {
        $.getJSON("getProdutoId/" + id, function (data) {
            $('#referenciaEdt').val(data[0]['referencia']);
            $('#descricaoEdt').val(data[0]['descricao']);
            $('#marcaEdt').val(data[0]['marca']);
            $('#precoEdt').val(data[0]['preco']);
            $('#estoqueEdt').val(data[0]['estoque']);
            $('#unidade_de_vendaEdt').val(data[0]['unidade_de_venda']);
        });
    }
    ;

    $('#formEditProduto').on('submit', function (e) {
        e.preventDefault();
        var id = $('#myModalAcoes').data('id');
        $('#myModalAcoes').modal('hide');
        $.ajax({
            type: "POST",
            url: "atualizarProduto",
            async: false,
            data: {data: JSON.stringify($('#formEditProduto').serializeArray())},
            success: function (data)
            {
                $('#callback').html(data);
                setTimeout(function () {
                    $('#myModal').modal('show');
                }, 500);
                if ($('#msg').text() == 'Produto atualizado com sucesso!') {
                    clearForm('#formEditCliente');
                    $('#table').dataTable().fnDestroy();
                    $('#table').remove();
                    FunGetListaProdutos();
                }
            },
            error: function (data)
            {
                $('#callback_form').html(data);
                $('#myModal').modal('show');
            }
        });
    });

    $('#inativarProduto').on('click', function (e) {
        e.preventDefault();
        var id = $('#myModalAcoes').data('id');
        $('#myModalAcoes').modal('hide');
        var obj = {"id": id};
        $.ajax({
            type: "POST",
            url: "inativarProduto",
            async: false,
            data: {data: JSON.stringify(obj)},
            success: function (data)
            {
                $('#callback').html(data);
                setTimeout(function () {
                    $('#myModal').modal('show');
                }, 500);
                if ($('#msg').text() == 'Produto removido com sucesso!') {
                    $('#table').dataTable().fnDestroy();
                    $('#table').remove();
                    FunGetListaProdutos();
                }
            },
            error: function (data)
            {
                $('#callback_form').html(data);
                $('#myModal').modal('show');
            }
        });
    });

    if ($("div#clientes").length) {
        selectClientes();
        function selectClientes() {
            $.getJSON("http://localhost/projetoIpe/clientes/getAllClientes", function (data) {
                var content = "<select id='id_cliente' name='id_cliente' class='form-control' required='true'>";
                content += '<option></option>';
                $.each(data, function (key, val) {
                    content += '<option value="' + val.id + '">' + val.nome.toUpperCase() + '</option>';
                });
                content += "</select>";
                $('#clientes').append(content);
            });
        }
        ;
    }


    var contador = 0;
    function createElement(index) {
        $("<div id='produtos_id" + index + "' class='form-group col-lg-12 remove'></div>").appendTo($('#div_protudo'));

        $('#produtos_id' + index).load("mostraProdutos", function (response, status) {
            if (status == "success") {
                $("<div class='col-lg-12 form-group'><span id='bt_remove" + index + "' class='btn btn-danger pull-right botao' ><i class='fa fa-trash-o' aria-hidden='true'></i> Remover Produto</span></div><br><br>").appendTo($('#produtos_id' + index));
                removeProduto(index);
            }
        });
    }
    ;

    function addDiv() {
        $("#div_protudo").append(createElement(contador++));
    }
    ;

    $("#bt_add").click(addDiv);

    function removeProduto(i) {
        $('#bt_remove' + i).on('click', function () {
            $('#produtos_id' + i).remove();
        });
    }
    ;



    $('#formAddVenda').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "AddVenda",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data)
            {
                $('#callback').html(data);
                $('#myModal').modal('show');

                if ($('#msg').text() == 'Comprovante da Compra:') {
                    clearForm('#formAddVenda');
                }
            },
            error: function (data)
            {
                $('#callback_form').html(data);
                $('#myModal').modal('show');
            }
        });
    });

    var tourPerfilLider = new Tour({
        storage: false,
        template: "<div class='popover tour'><div class='arrow'></div><h3 class='popover-title'></h3><div class='popover-content'></div><div class='popover-navigation'><button class='btn btn-default' data-role='prev'>« Anterior</button><button class='btn btn-default' data-role='next'>Próximo »</button></div><div class='popover-navigation'><button class='btn btn-primary pull-right' data-role='end'><i class='fa fa-times-circle' aria-hidden='true'></i> Fechar</button></div></div>",
        steps: [
            {
                element: "#step1",
                title: "Conhecendo os menus da aplicação",
                content: "Vamos conhecer o menu lateral esquedo passo a passo. ",
                placement: "right"
            },
            {
                element: "#step2",
                title: "Clientes",
                content: "Na opção de Clientes você pode cadastrar, listar, editar e excluir um determinado cliente!",
                placement: "right"
            },
            {
                element: "#step3",
                title: "Produtos",
                content: "Na opção de Produtos você pode cadastrar, listar, editar e excluir um determinado produto!",
                placement: "right"
            },
            {
                element: "#step4",
                title: "Venda",
                content: "Na opção de vendas você poderá efetuar venda para um determinado cliente escolhendo os produtos e quantidades!",
                placement: "right"
            },
            {
                element: "#steepFim",
                title: "Fim do Tour",
                content: "Chegamos ao fim do seu Tour, legal né ? se ainda tiver dúvidas basta iniciar novamente.",
                placement: "top"
            }

        ],
    });
    $('#iniciarTour').on('click', function () {
        tourPerfilLider.start();
        tourPerfilLider.restart();
    });

    $('#buscaVenedaFiltro').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "buscarVenda",
            async: false,
            data: {data: JSON.stringify($('#buscaVenedaFiltro').serializeArray())},
            success: function (data)
            {
                $('#table').dataTable().fnDestroy();
                $('#table').remove();
                var obj = jQuery.parseJSON(data);
                if (obj == null) {
                    $('#callback').text('Não localizada venda no periódo selecionado para este cliente!');
                } else {
                    $('#callback').text('');
                    var content = "<table id='table' class='table table-bordered table-striped' >";
                    content += '<thead><tr><th>ID</th><th>DESCRIÇÃO</th><th>PREÇO UNITÁRIO</th><th>QUANTIDADE</th><th>NOME CLIENTE</th><th>DATA VENDA</th></tr></thead>';
                    $.each(obj, function (key, val) {
                        content += '<tr data-id="' + val.id + '">';
                        content += '<td>' + val.id + '</td>';
                        content += '<td>' + val.descricao + '</td>';
                        content += '<td>' + val.preco + '</td>';
                        content += '<td>' + val.qtd + '</td>';
                        content += '<td>' + val.nome + '</td>';
                        content += '<td>' + val.dt_venda + '</td>';
                        content += '</tr>';
                    });
                    content += "</table>";
                    $('#callback').append(content);
                    $('#table').DataTable({
                        drawCallback: function () {}
                    });
                }

            }
        });
    });


})
