package model

type Order struct {
	ID       int
	Client   Client
	Products []Product
}
