<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/*
Вывод навигации по статье. Формируется список из заголовков H2.

Нужно добавитьт блок, где выводится список. Класс article_navigation
<div class="article_navigation"></div>
<?= snippet('article-navigation') ?>

или для H4

<?= snippet('article-navigation', 'h4') ?>

или с оформлением
<div class="article_navigation t90"></div>

*/

// можно указать по каким тэгам делать навигацию
$h2 = $DATA ? $DATA : 'h2';
$header = $DATA1 ? $DATA1 : 'Навигация по статье';

echo strRemoveLF(<<<TXT
<!-- nosimple --> <script>
document.addEventListener("DOMContentLoaded", function() {
   var resultList = document.querySelector(".article_navigation");
   var h2Elements = document.querySelectorAll("{$h2}");
   var navigationDiv = document.createElement("div");
   var ulElement = document.createElement("ul");
   resultList.classList.add("b-right", "w30", "w300px-min", "w100-tablet", "pad10-tb", "pad15-rl", "mar10", "bg-gray50", "rounded", "boredred");
   navigationDiv.classList.add("t130", "mar10-tb");
   navigationDiv.textContent = "{$header}";
   ulElement.classList.add("square", "mar10-t", "pad20-l");
   h2Elements.forEach(function(h2Element, index) {
      var anchor = document.createElement("a");
      var linkName = h2Element.textContent.replace(/<[^>]*>/g, "").replace(/[^\p{L}\p{N}\s\-]/gu, "").replace(/\s+/g, "-").replace(/^-+|-+$/g, "").toLowerCase();
      var liElement = document.createElement("li");
      var link = document.createElement("a");
      anchor.setAttribute("name", linkName);
      h2Element.appendChild(anchor);
      link.textContent = h2Element.textContent;
      link.setAttribute("href", "#" + linkName);
      liElement.appendChild(link);
      ulElement.appendChild(liElement);
   });
   resultList.appendChild(navigationDiv);
   resultList.appendChild(ulElement);
});
</script> <!-- /nosimple -->
TXT);

# end of file