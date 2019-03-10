
function initDrag(){
    const wrapper = document.querySelectorAll(".tasklist");
    // const todo = document.querySelectorAll(".task");
    for(const wrap of wrapper) {
        new Sortable(wrap, {
          group: "sorting",
          sort: true
        });
    }
    //
    // for(const item of todo) {
    //     new Sortable(item, {
    //       group: "sorting",
    //       sort: true
    //     });
    // }

    const tasks = document.querySelectorAll('.tasklist__nested');
    for(let task of tasks) {
        new Sortable(task, {
          group: "nested",
          animation: 150,
          filter: ".tasklist__header",
          onEnd: function(e) {
              console.log(e.from);
              console.log(e.to);
              console.log(e.newIndex);
              console.log(e.item.attributes[1].value);
          }
        });
    }
}
window.onload = initDrag;
