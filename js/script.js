function confirm1(id, data) {
    var bool = confirm(data + "のデータを削除してよろしいですか？");
    if (bool) {
        location.href = "hb_g/delete/" + id + "/";
    } else {
        alert("データの削除をキャンセルしました。")
    }
}

function confirm2(id, date, name, data) {
    if (name == "income") {
        var bool = confirm(date + "の給料:" + data + "円のデータを削除してよろしいですか？");
    } else if (name == "bonus") {
        var bool = confirm(date + "のボーナス:" + data + "円のデータを削除してよろしいですか？");
    } else if (name == "investment-income") {
        var bool = confirm(date + "の投資収益:" + data + "円のデータを削除してよろしいですか？");
    } else if (name == "other") {
        var bool = confirm(date + "のその他:" + data + "円のデータを削除してよろしいですか？");
    }
    if (bool) {
        location.href = "hb_i/delete/" + id + "/" + data + "/";
    } else {
        alert("データの削除をキャンセルしました。")
    }
}

function confirm3(id, date, genre, data) {
    var bool = confirm(date + ":" + genre + ":" + data + "円のデータを削除してよろしいですか？");
    if (bool) {
        location.href = "hb_s/delete/" + id + "/" + data + "/";
    } else {
        alert("データの削除をキャンセルしました。")
    }
}

function confirm4(id, num, period, name, data) {
    if (period == "day") {
        var bool = confirm(name + ":" + num + "日当たり" + data + "円のデータを削除してよろしいですか？");
    } else if (period == "week") {
        var bool = confirm(name + ":" + num + "週間当たり" + data + "円のデータを削除してよろしいですか？");
    } else if (period == "month") {
        var bool = confirm(name + ":" + num + "ヶ月当たり" + data + "円のデータを削除してよろしいですか？");
    } else if (period == "year") {
        var bool = confirm(name + ":" + num + "年当たり" + data + "円のデータを削除してよろしいですか？");
    }
    if (bool) {
        location.href = "hb_r/delete/" + id + "/" + data + "/";
    } else {
        alert("データの削除をキャンセルしました。")
    }
}

function confirm5(id, data) {
    var bool = confirm(data + "のデータを削除してよろしいですか？");
    if (bool) {
        location.href = "hb_g_i/delete/" + id + "/";
    } else {
        alert("データの削除をキャンセルしました。")
    }
}

window.onload = function() {
    var popup = document.getElementById('js-popup');
    if (!popup) return;
    popup.classList.add('is-show');
    window.setTimeout(function() {
        popup.classList.remove('is-show');
    }, 1000);
}