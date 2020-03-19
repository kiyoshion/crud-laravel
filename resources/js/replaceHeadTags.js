export { replaceHeadTags };

function replaceHeadTags(target) {
    var head = document.head;
    var newPageRawHead = target.match(/<head[^>]*>([\s\S.]*)<\/head>/i)[0];
    var newPageHead = document.createElement('head');
    newPageHead.innerHTML = newPageRawHead;

    var removeHeadTags = [
        "meta[name='robots']",
        "meta[name='keywords']",
        "meta[name='description']",
        "meta[property^='og']",
        "meta[name^='twitter']",
        "meta[itemprop]",
        "link[rel='next']",
        "link[rel='prev']",
        "link[rel='alternate']",
        "link[rel='canonical']",
        "meta[name='csrf-token']"
    ].join(',');
    var headTags = head.querySelectorAll(removeHeadTags);
    for (var i = 0; i < headTags.length; i++) {
        head.removeChild(headTags[i]);
    }
    var newHeadTags = newPageHead.querySelectorAll(removeHeadTags);

    for (var i = 0; i < newHeadTags.length; i++) {
        head.appendChild(newHeadTags[i]);
    }

}