  window.onload = function () {
    //管理システムのご意見
    let opinions = document.getElementsByClassName('opinion-short');
    for( let i = 0 ; i < opinions.length ; i++ ) {
      let str = opinions[i].innerText;
      str = str.substring(0, 25);
      opinions[i].innerText = str + "...";
    }
    
    //登録日の上限
    let today = new Date();
    let dd = today.getDate();
    let mm = today.getMonth() + 1;
    const yyyy = today.getFullYear();
    if(dd < 10) dd ='0'+ dd
    if(mm < 10) mm ='0'+ mm

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("created_at_from").setAttribute("max", today);
    document.getElementById("created_at_to").setAttribute("max", today);
  }
{
  function confirmDeletion(event)
  {
    if (confirm('削除しますか？')) {
      form.submit();
    } else {
      event.preventDefault();
    }
  }
  
}