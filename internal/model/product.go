package model

type Product struct {
	ID            int
	Name          string  `json:"name"`
	Price         float64 `json:"price"`
	AmountInStock int     `json:"amount_in_stock"`
}
