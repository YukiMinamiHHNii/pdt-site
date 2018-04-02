(
  (d, c) => {
      c("Connected");
      initSelect();
      initTabs();
      initModal();
  }
)(document, console.log);

function initSelect(){
  var el = document.querySelectorAll('select');
  var instance = M.FormSelect.init(el);
}

function initTabs(){
  var el = document.querySelectorAll('.tabs');
  var instance = M.Tabs.init(el);
}

function initModal(){
  var el = document.querySelector('.modal');
  var instance = M.Modal.init(el);
}
