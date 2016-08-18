function confirmDelete(delUrl) {
	if (confirm("Сигурни ли сте, че искате да изтриете този студент")) {
			document.location = delUrl;
	}
}