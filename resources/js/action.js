(
  (d, c) => {
    c("Connected");
    initNav();
    initSelect();
    initTabs();
    initModal();
    showPokedexCards();
    showPokedexTable();
    getPokedexFilterValues();
    pokedexOperations();
    typingOperations();
  })(document, console.log);

function initNav() {
  var el = document.querySelector('.dropdown-trigger');
  var instance = M.Dropdown.init(el);
}

function initSelect() {
  var el = document.querySelectorAll('select');
  var instance = M.FormSelect.init(el);
}

function initTabs() {
  var el = document.querySelectorAll('.tabs');
  var instance = M.Tabs.init(el);
}

function initModal() {
  var el = document.querySelectorAll('.modal');
  var instance = M.Modal.init(el);
}

function getXHRType() {
  let request;
  if (window.XMLHttpRequest) {
    request = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    request = new ActiveXObject("Microsoft.XMLHTTP");
  }
  return request;
}

function ajaxRequest(data, callback) {
  let req = getXHRType(),
      res;

  req.open(data.type, data.endpoint, true);

  req.addEventListener('readystatechange', e => {
    if (req.readyState === 4) {
      if (req.status >= 200 && req.status < 400) {
        console.log(req.response);
        callback(JSON.parse(req.response));
      } else {
        console.log(req.response);
        callback(JSON.parse({
            type:'AJAX Post',
            data:`${req.status}`,
            message:`${req.statusText}`
          }));
      }
    }
  });

  if(data.type==='POST'){
    req.send(data.args);
  }else{
    req.send();
  }
}

function pokedexOperations(){
  document.addEventListener('DOMContentLoaded', e=>{
    readAllSpecies();
  });
}

function showPokedexCards() {
  let showCards = document.getElementById('show-cards'),
      showResult = document.getElementById('show-result'),
      request = getXHRType();

  if (showCards) {
    showCards.addEventListener('click', e => {
      showResult.innerHTML='<p>TestingCards</p>';
      // request.open('GET', '/pokedex/search-cards.php');
      // request.addEventListener('readystatechange', e => {
      //   if (request.readyState === 4) {
      //     showResult.innerHTML = request.response;
      //   }
      // });
      // request.send();
    });
  }
}

function readAllSpecies(){
  let showResult = document.getElementById('show-result'),
      cards= document.getElementById('pokemon-card-template').content,
      req={
        type:'GET',
        endpoint:'/src/controllers/SpeciesController.php?q=1',
        args:null
      };

    ajaxRequest(req, res=>{
      res.data.forEach(row=>{
        cards.querySelector('.card-name').textContent= row.name;

        getSpeciesTypings(row.typing, typings=>{
          cards.querySelector('.card-typing').textContent= typings.join('/');
        });

        getSpeciesAbilities(row.ability, abilities=>{
          cards.querySelector('.card-ability').textContent= abilities.join('/');
        });

        let clone = document.importNode(cards, true);
        showResult.appendChild(clone);
      });
    });

}

function getSpeciesTypings(typingObj, callback){
  let typings=[];
  typingObj.forEach(obj=>{
      typings.push(obj.name);
  });
  callback(typings);
}

function getSpeciesAbilities(abilityObj, callback){
  let abilities=[];
  abilityObj.forEach(obj=>{
      abilities.push(obj.name);
  });
  callback(abilities);
}


function showPokedexTable() {
  let showTable = document.getElementById('show-table'),
      showResult = document.getElementById('show-result'),
      request = getXHRType();

  if (showTable) {
    showTable.addEventListener('click', e => {
      e.preventDefault();
      request.open('GET', '/pokedex/search-table.php');
      request.addEventListener('readystatechange', e => {
        if (request.readyState === 4) {
          showResult.innerHTML = request.response;
        }
      });
      request.send();
    });
  }
}

function getPokedexFilterValues() {
  let filterType = document.getElementById('pokedex-filterType'),
      filterValue = document.getElementById('pokedex-filterValue'),
      req;

  if (filterType) {
    filterType.addEventListener('change', e => {
      filterValue.options.length = 0;
      switch (e.target.value) {
        case 'typing':
          req= {
            type: 'GET',
            endpoint: '/src/controllers/TypingController.php?q=1',
            args: null
          };

          ajaxRequest(req, res=>{
            res.data.forEach(e => {
              let newOption = document.createElement("option");
              newOption.value = e.typing_id;
              newOption.innerHTML = e.name;
              filterValue.options.add(newOption);
            });
            M.FormSelect.init(filterValue);
          });
        break;

        case 'ability':
          req = {
            type: 'GET',
            endpoint: '/src/controllers/AbilityController.php?q=1',
            args: null
          };

          ajaxRequest(req, res=>{
            res.data.forEach(e => {
              let newOption = document.createElement("option");
              newOption.value = e.ability_id;
              newOption.innerHTML = e.name;
              filterValue.options.add(newOption);
            });
            M.FormSelect.init(filterValue);
          });
        break;
      }
    });
  }
}

function typingOperations(){
  document.addEventListener('submit', e=>{
    let req, action;
    e.preventDefault();
    if(e.target.matches('.form-add')){
      action=2;
    }else if(e.target.matches('.form-edit')){
      action=3;
    }else if(e.target.matches('.form-delete')){
      action=4;
    }

    req={
      type:'POST',
      endpoint:`/src/controllers/TypingController.php?q=${action}`,
      args:new FormData(e.target)
    }

    ajaxRequest(req, res=>{
      readAllTyping();
    });
  });

  document.addEventListener('click', e=>{
    let form;
    if(e.target.matches('.typing-edit')){
      form= document.querySelector('.form-edit');
      form.querySelector('[name="typingName"]').value = e.target.dataset.name;
      form.querySelector('[name="typingID"]').value = e.target.dataset.id;
    }else if(e.target.matches('.typing-delete')){
      form = document.querySelector('.form-delete');
      form.querySelector('span').textContent= e.target.dataset.name;
      form.querySelector('[name="typingID"]').value = e.target.dataset.id;
    }
  });
}

function readAllTyping(){
  let typingTable= document.getElementById('typing-table'),
      typingRow= document.getElementById('typing-row').content,
      req={
        type:'GET',
        endpoint:'/src/controllers/TypingController.php?q=1',
        args:null
      };

  if(typingTable){
    typingTable.innerHTML="";
    ajaxRequest(req, res=>{
      res.data.forEach(row=>{
        typingRow.querySelector('.typing-id').textContent = row.typing_id;
        typingRow.querySelector('.typing-name').textContent = row.name;
        typingRow.querySelector('.typing-edit').dataset.id = row.typing_id;
        typingRow.querySelector('.typing-edit').dataset.name = row.name;
        typingRow.querySelector('.typing-delete').dataset.id = row.typing_id;
        typingRow.querySelector('.typing-delete').dataset.name = row.name;

        let clone = document.importNode(typingRow, true);
        typingTable.appendChild(clone);
      });
    });
  }
}
