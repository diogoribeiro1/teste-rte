var listaPessoas = [];
console.log(listaPessoas);

var tbody = document.getElementById("tbody");

tbody.innerHTML = [
    '<tr>',
    '<td>Tiago</td>',
    '<td>',
    '<button>Remover</button>',
    '</td>',
    '</tr>',
    '<tr>',
    '<td>-Gustavo</td>',
    '<td>',
    '<button>Remover filho</button>',
    '</td>',
    '<tr>',
    '<th colspan="4">',
    '<button>Adicionar Filho</button>',
    '</th>',
    '</tr>'
].join("\n");

    function incluirPessoa() {
    var valor = document.getElementById("nome").value;
    var pessoa = new Object();
    pessoa.nome = valor;
    listaPessoas.push(pessoa);
    localStorage.setItem('listaPessoas',listaPessoas);
    alert("Você digitou: " + JSON.stringify(listaPessoas));
}

    function incluirFilho() {
    pessoa.filhos = [valor];
    alert("Você digitou: " + JSON.stringify(pessoa));
}
