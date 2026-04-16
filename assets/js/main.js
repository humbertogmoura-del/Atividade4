// ========== INICIALIZAÇÃO ==========
$(document).ready(function() {
    carregarCategorias();
    carregarProdutos();
    carregarSelectCategorias();
});

// ========== CATEGORIAS ==========
function carregarCategorias() {
    $.ajax({
        url: 'api/categoria/ler.php',
        type: 'GET',
        success: function(data) {
            $('#listaCategorias').html(data);
        },
        error: function() {
            $('#listaCategorias').html('<p>Erro ao carregar categorias</p>');
        }
    });
}

function inserirCategoria() {
    let nome = $('#novaCategoria').val().trim();
    
    if (nome === '') {
        alert('Por favor, digite um nome para a categoria');
        return;
    }
    
    $.ajax({
        url: 'api/categoria/inserir.php',
        type: 'POST',
        data: { nome: nome },
        success: function() {
            $('#novaCategoria').val('');
            carregarCategorias();
            carregarSelectCategorias();
            alert('Categoria inserida com sucesso!');
        },
        error: function() {
            alert('Erro ao inserir categoria');
        }
    });
}

function excluirCategoria(id) {
    if (!confirm('Tem certeza que deseja excluir esta categoria? Os produtos ficarão sem categoria.')) {
        return;
    }
    
    $.ajax({
        url: 'api/categoria/excluir.php',
        type: 'POST',
        data: { id: id },
        success: function() {
            carregarCategorias();
            carregarSelectCategorias();
            carregarProdutos();
            alert('Categoria excluída com sucesso!');
        },
        error: function() {
            alert('Erro ao excluir categoria');
        }
    });
}

// ========== PRODUTOS ==========
function carregarProdutos() {
    $.ajax({
        url: 'api/produto/ler.php',
        type: 'GET',
        success: function(data) {
            $('#listaProdutos').html(data);
        },
        error: function() {
            $('#listaProdutos').html('<p>Erro ao carregar produtos</p>');
        }
    });
}

function carregarSelectCategorias() {
    $.ajax({
        url: 'api/categoria/select.php',
        type: 'GET',
        success: function(data) {
            $('#produtoCategoria').html(data);
        },
        error: function() {
            $('#produtoCategoria').html('<option value="">Erro ao carregar categorias</option>');
        }
    });
}

function inserirProduto() {
    let nome = $('#produtoNome').val().trim();
    let preco = $('#produtoPreco').val().trim();
    let categoria_id = $('#produtoCategoria').val();
    
    if (nome === '') {
        alert('Por favor, digite um nome para o produto');
        return;
    }
    
    if (preco === '' || preco <= 0) {
        alert('Por favor, digite um preço válido');
        return;
    }
    
    $.ajax({
        url: 'api/produto/inserir.php',
        type: 'POST',
        data: { 
            nome: nome, 
            preco: preco, 
            categoria_id: categoria_id 
        },
        success: function() {
            $('#produtoNome').val('');
            $('#produtoPreco').val('');
            carregarProdutos();
            alert('Produto inserido com sucesso!');
        },
        error: function() {
            alert('Erro ao inserir produto');
        }
    });
}

function excluirProduto(id) {
    if (!confirm('Tem certeza que deseja excluir este produto?')) {
        return;
    }
    
    $.ajax({
        url: 'api/produto/excluir.php',
        type: 'POST',
        data: { id: id },
        success: function() {
            carregarProdutos();
            alert('Produto excluído com sucesso!');
        },
        error: function() {
            alert('Erro ao excluir produto');
        }
    });
}

// ========== EDITAR CATEGORIAS ==========
function abrirEditarCategoria(id, nome) {
    $('#editarCategoriaId').val(id);
    $('#editarCategoriaNome').val(nome);
    $('#modalEditarCategoria').show();
}

function salvarEditarCategoria() {
    let id = $('#editarCategoriaId').val();
    let nome = $('#editarCategoriaNome').val().trim();
    
    if (nome === '') {
        alert('Por favor, digite um nome para a categoria');
        return;
    }
    
    $.ajax({
        url: 'api/categoria/editar.php',
        type: 'POST',
        data: { id: id, nome: nome },
        success: function() {
            cancelarEdicao();
            carregarCategorias();
            carregarSelectCategorias();
            alert('Categoria atualizada com sucesso!');
        },
        error: function() {
            alert('Erro ao atualizar categoria');
        }
    });
}

// ========== EDITAR PRODUTOS ==========
function abrirEditarProduto(id, nome, preco, categoria_id) {
    $('#editarProdutoId').val(id);
    $('#editarProdutoNome').val(nome);
    $('#editarProdutoPreco').val(preco);
    
    // Carregar categorias no select do modal
    $.ajax({
        url: 'api/categoria/select.php',
        type: 'GET',
        success: function(data) {
            $('#editarProdutoCategoria').html(data);
            $('#editarProdutoCategoria').val(categoria_id || '');
        }
    });
    
    $('#modalEditarProduto').show();
}

function salvarEditarProduto() {
    let id = $('#editarProdutoId').val();
    let nome = $('#editarProdutoNome').val().trim();
    let preco = $('#editarProdutoPreco').val().trim();
    let categoria_id = $('#editarProdutoCategoria').val();
    
    if (nome === '') {
        alert('Por favor, digite um nome para o produto');
        return;
    }
    
    if (preco === '' || preco <= 0) {
        alert('Por favor, digite um preço válido');
        return;
    }
    
    $.ajax({
        url: 'api/produto/editar.php',
        type: 'POST',
        data: { 
            id: id,
            nome: nome, 
            preco: preco, 
            categoria_id: categoria_id 
        },
        success: function() {
            cancelarEdicao();
            carregarProdutos();
            alert('Produto atualizado com sucesso!');
        },
        error: function() {
            alert('Erro ao atualizar produto');
        }
    });
}

function cancelarEdicao() {
    $('#modalEditarCategoria').hide();
    $('#modalEditarProduto').hide();
}
