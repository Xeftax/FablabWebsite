function saveStaticDataToFile(data, path) {
    var blob = new Blob([data],
        { type: "text/plain;charset=utf-8" });
    saveAs(blob, path);
}