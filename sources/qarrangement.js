function setcss()
{
    //alert("graag");
    for (i = 1; i <= numberq; i++)
    {
        var tr = document.getElementById("id" + i);
        if (i == activeq)
        {
            tr.style.opacity = 1;
            tr.style.display = "table-row";
        }
        else if (i + 1 == activeq || i - 1 == activeq)
        {
            tr.style.opacity = 0.4;
            tr.style.display = "table-row";
        }
        /*else if (i + 2 == activeq || i - 2 == activeq)
        {
            tr.style.opacity = 0.2;
            tr.style.display = "table-row";
        }*/
        else
        {
            tr.style.display = "none";
            //tr.style.opacity = 0.1;
        }
    }
}
function fnext()
{
    activeq++;
    if (activeq > numberq)
    {
        activeq = numberq;
    }
    setcss();
}
function fprevious()
{
    activeq--;
    if (activeq < 1)
    {
        activeq = 1;
    }
    setcss();
}
function ffocus(number)
{
    activeq = number;
    setcss();
}