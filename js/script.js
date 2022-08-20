var pessoas = [];

const buttonIncluir = document.getElementById("incluirButton"); // Botão Incluir
const inputNome = document.getElementById("nome"); //input onde é inserido o nome
const tbody = document.getElementById("tbody"); // corpo da tabela
const textJson = document.getElementById("textjson"); // textjson

$( document ).ready(function() {
    limparTextArea();
});

$(function () {
    $(".enviarJsonPhp").on("click", function () {
        $.ajax({
            url: "controller/PessoaController.php",
            method: 'POST',
            data: {pessoas},
            type: 'json',
            success: function (result) {
                alert('Sucesso');
            }
        })
    })
})

$(function () {
    $(".buscarJsonPhp").on("click", function () {
        $.ajax({
            url: "controller/PessoaController.php",
            method: 'GET',
            type: 'json',
            success: function (result) {
                pessoas = JSON.parse(result);
                setarJson();
                listagem();
            },
            error: function () {
                // console.log(`error`);
                // alert('error');
            }
        })
    })
})

function incluirPessoa(pessoa) {
    limparTextArea()
    const obj = {id: pessoas.length, filhos: [], ...{nome: pessoa}}
    pessoas.push(obj)
    listagem()
    setarJson()
}

buttonIncluir.addEventListener('click', () => {
    incluirPessoa(inputNome.value)
})

function setarJson() {
    textJson.value = `{
    "pessoas":[ \n ${
        pessoas.map((pessoa, index) => {
            return `{
       "nome": "${pessoa.nome}"
       "filhos":[${pessoa.filhos.map((filhos) => {return `
         "${filhos}", `}).join('')}
        ]
      }
    ]`})
     }
}`
}

function limparTextArea() {
    textJson.value = `{
      "pessoa": []
}`
}

function listagem() {
    tbody.innerHTML =
        pessoas.map((pessoa, id) => {
            return `
          <tr>
            <td>${pessoa.nome}</td>
            <td>
              <button onclick="remover(${id})">Remover</button>
            </td>
          </tr>
          ${pessoa.filhos.map((item, idfilho) => {
                return `    
              <tr>
                <td>-${item}</td>
                <td>
                  <button onclick="removerFilho(${id}, ${idfilho})">Remover filho</button>
                </td>
              </tr>`
            }).join('')
            }
          <tr>
            <th colspan="4">
              <button onclick="incluirFilho(${id})">Adicionar Filho</button>
            </th>
          </tr>
          `
        }).join('')
}

function incluirFilho(id) {
    var valor = prompt("Informe o nome:");
    pessoas[id].filhos.push(valor)
    setarJson();
    listagem();
}

function removerFilho(id, idfilho) {
    pessoas[id].filhos.splice(idfilho, 1)
    listagem();
    setarJson()
}

function remover(id) {
    pessoas.splice(id, 1)
    listagem();
    setarJson()
}