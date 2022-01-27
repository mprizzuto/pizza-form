# pizza form calculator

# goal
create a calculator to evenly divide pizza slices among people

## inputs
- pizza pies
- guests


## outputs
a string: "there are {guest} people coming. each person gets {pizzaSlice} slice of pizza"

## pseudocode
- *convert* form field values from strings to numbers
- dont allow negative values
- *only allow whole numbers* (i.e prevent invalid guest amount)
- dynamically print singular or plural for pizzas(see **tests**) based on *guest amount*
- *output error in form fields* for user feedback
## tests
### singular
one pizza
one person
returns a string: "there is {guest} person coming. they get {pizzaSlice} slices of pizza"


### plural
returns a string: "there are {guest} people coming. each person gets {pizzaSlice} slice of pizza"

### failing
0 pizza
0 people
error: 0 people and pizza is no party!

foreign-character pizza (i.e !@#)
foreign-character people (i.e !@#)
error: invalid entry, enter valid data please



