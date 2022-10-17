#include <iostream>

using namespace std;

int main()
{
	int basis = 0;
	int expo = 0;
	float erg = 1;
	int a = 0;

	cout << "Geben die Basis ein: ";
	cin >> basis;
	cout << "Geben die Exponent ein: ";
	cin >> expo;

	a = expo;

	if (expo < 0) {
		expo = expo * -1;
	}


	for (int x = 0; x < expo; x++) {
		erg = erg * basis;
	}


	if (a < 0) {
		erg = 1 / erg;
	}



	cout << "Ergebnis: " << erg;

}
