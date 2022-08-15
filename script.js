var pessoas = [];
pessoas.map((pessoa) => {
  console.log(pessoa.nome);
})
console.log(pessoas);
// const pessoas = [
//     {
//         nome: "Diogo",
//         filhos: [
//             "Joaquin","Enzo"
//         ]
//     },
//     {
//         nome: "Thiago",
//         filhos: [
//             "Vini",
//             "Pique"
//         ]
//     }
// ]

var tbody = document.getElementById("tbody");

// pessoas.map((pessoa) => {
//     tbody.innerHTML += `
//          <tr>
//             <td>${pessoa.nome}</td>
//             <td>
//                 <button>Remover</button>
//             </td>
//         </tr>
//
//         ${pessoa.filhos.map((item) => {
//         return `
//         <tr>
//          <td>-${item}</td>
//          <td>
//                 <button onclick="removerFilho()">Remover filho</button>
//          </td>
//         </tr>
//         `
//     }).join('')}
//         <tr>
//             <th colspan="4">
//                 <button onclick="incluirFilho()">Adicionar Filho</button>
//             </th>
//         </tr>
//     `
// })
var nome;
function listar (){
    pessoas.map((pessoa) => {
        tbody.innerHTML += `
         <tr>
            <td>${nome = pessoa.nome}</td>
            <td>
                <button>Remover</button>
            </td>
        </tr>
         
        ${pessoa.filhos.map((item) => {
            return `    
        <tr>
         <td>-${item}</td>
         <td>
                <button onclick="removerFilho(nome)">Remover filho</button>
         </td>
        </tr>
        `
        }).join('')}
        <tr>
            <th colspan="4">
                <button onclick="incluirFilho(nome)">Adicionar Filho</button>
            </th>
        </tr>
    `
    })
}

function incluirPessoa() {
    var valor = document.getElementById("nome").value;
    var pessoa = {
        'nome' : valor,
        'filhos': [

        ]
    };
    pessoas.push(pessoa);
    localStorage.setItem('listaPessoas', pessoas);
    alert("Você digitou: " + JSON.stringify(pessoas));
    listar();
}

function incluirFilho(nomeRecpt) {
    var valor = prompt("Informe o nome:");
    const objPerson = pessoas.find(element => element.nome == nomeRecpt);
    objPerson.filhos = [valor];
    // pessoas.push(objPerson);
    // alert("Você digitou: " + JSON.stringify(valor));
    listar();
}

function remover() {

}

function removerFilho() {
    pessoa.filhos = [valor];
    alert("Você digitou: " + JSON.stringify(pessoa));
}
