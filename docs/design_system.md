# Design System for Yatzy Game

## Fonts

The Yatzy game uses the following fonts:

- "Times New Roman" is used in the `.table` class.

## Colors

The Yatzy game uses the following colors:

- `#cde2e3` is used as the background color for the `html` and `body` elements.
- `white` and `rgb(203, 225, 225)` are used in a linear gradient for the background of the `.table` class.
- `black` is used for the text color in the `.table` class.
- `rgb(84, 243, 5)` is used as the background color for the `.header` class.
- `whitesmoke` is used for the text color and border color in the `.header-cell` class.

## Layout

The Yatzy game uses the following layout styles:

- The `#gameContainer` uses a flex layout, with content centered both vertically and horizontally. It takes up 100% of the width and height of the viewport, with a top margin of 40px.
- The `.table` class represents each game table, with a width of 30% and a margin of 30px. It uses a collapsed border style and has a cursor pointer on hover.
- The `.header` class represents the header of each game table, with a green background color.
- The `.header-cell` class represents each cell in the header, with a width of 20%, centered text, and padding of 7px.

## Typography

The Yatzy game uses the following typography styles:

- The `.table` class uses a font size of 16px.
- The `.header-cell` class uses a font size of 12px.

## Dice

The dice in the Yatzy game have the following look and feel:

- Maximum width: 40px
- Maximum height: 40px
- Border radius: 10px
- Transition: all properties change over a duration of 0.4s in a linear fashion
- Z-index: 1000 (this means the dice will appear on top of any other elements with a lower z-index)

## Roll Button

The roll button in the Yatzy game has the following look and feel:

- Width: 50px
- Height: 50px
- Border radius: 50% (this makes the button circular)
- Border: transparent
- Text color: whitesmoke
- Font weight: bold
- Background image: `button.png`
- Cursor: pointer (this changes the cursor to a hand when hovering over the button)

When the roll button is hovered over, it scales up to 110% of its original size.

You can see the code for the dice in the [`dice.html`](./assets/design_system/dice.html) file.