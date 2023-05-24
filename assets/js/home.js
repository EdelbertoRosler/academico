window.onload = function() {
    // Obtém os valores dos parâmetros da URL
    const urlParams = new URLSearchParams(window.location.search);
    const alunos = urlParams.get('alunos');
    const professores = urlParams.get('professores');

    document.getElementById('students').textContent += alunos;
    document.getElementById('teachers').textContent += professores;

    const modal = document.getElementById("myModal");
    const tableAluno = document.querySelector('.table-aluno');
    const tableProfessor = document.querySelector('.table-professor');
    const modalTitle = document.querySelector('.modal-title');
    alterStyleDisplay(tableAluno, 'none');
    alterStyleDisplay(tableProfessor, 'none');
 

    document.addEventListener("click",  function (e) {
                        
        if (e.target.id == 'button-aluno') {
            alterStyleDisplay(modal, 'block');
            alterStyleDisplay(tableAluno, '');
            modalTitle.textContent = 'Lista de Alunos';
        }

        if (e.target.id == 'button-professor') {
            alterStyleDisplay(modal, 'block');
            alterStyleDisplay(tableProfessor, '');
            modalTitle.textContent = 'Lista de Professores';
        }

        if (e.target.classList.contains('close')) {
            alterStyleDisplay(modal, 'none');
            alterStyleDisplay(tableAluno, 'none');
            alterStyleDisplay(tableProfessor, 'none');
        }

    });

}


function alterStyleDisplay(variable, displayMode) {
    variable.style.display = displayMode;
}
