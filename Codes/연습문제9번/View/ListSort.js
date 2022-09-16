/**
 * 상단 제목 클릭 시 정렬시키는 스크립트
 * 내림차순으로 정렬된다.
 */

$(document).ready(function() {
    let isNameAsc = false;
    let isScoreAsc = false;
    $("#name").on("click", function() { 
        let list = $("#mainTable").find("tbody>tr").get();
        list.sort(function(a, b){
            var n1 = $(a).children().eq(1).text();
            var n2 = $(b).children().eq(1).text();
            return (
                isNameAsc ? 
                (n1 < n2 ? 1: -1) :
                (n1 > n2 ? 1: -1)
            );
        });
        $.each(list, function(index, row) {
            $('#mainTable tbody').append(row);
        })
        
        isNameAsc ? (isNameAsc = false) : (isNameAsc = true);
    })

    $("#score").on("click", function() {
        let list = $("#mainTable").find("tbody>tr").get();
        list.sort(function(a, b){
            var n1 = Number(($(a).children().eq(5).text()));
            var n2 = Number(($(b).children().eq(5).text()));
            return (
                isScoreAsc ? 
                (n1 < n2 ? 1 : -1) :
                (n1 > n2 ? 1 : -1)
            );
        });
        $.each(list, function(index, row) {
            $('#mainTable tbody').append(row);
        })
        
        isScoreAsc ? (isScoreAsc = false) : (isScoreAsc = true);
    })
});