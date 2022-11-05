import javax.swing.*;
import java.awt.*;

import java.awt.event.MouseEvent;

import java.awt.event.MouseAdapter;

import static java.awt.event.MouseEvent.BUTTON3;

public class CustomPanel extends JPanel  {

    private ShapesManager shapesManager;
    public CustomPanel(ShapesManager shapeManager) {
        this.shapesManager = shapeManager;
        addMouseListener();
    }

    @Override
    protected void paintComponent(Graphics g) {
        super.paintComponent( g );
        shapesManager.drawShapes( g );
    }
    private void addMouseListener(){

        addMouseListener(new MouseAdapter() {
    @Override
    public void mouseClicked(MouseEvent e) {
        super.mouseClicked( e );
        for (Shape currShape : shapesManager.getShapes()) {
            BoundingBox boundingBox = currShape.setupBoundingBox();
            if ((e.getPoint().x >= boundingBox.getBottomLeft().getX() && e.getPoint().x <= boundingBox.getTopRight().getX())
                    && (e.getPoint().y <= boundingBox.getBottomLeft().getY()) && e.getPoint().y >= boundingBox.getTopRight().getY()) {
                currShape.toggleFilling();
                System.out.println( "You left cliecked on shape " + currShape );
            }
        }
            CustomPanel.super.repaint();
        }

        });
    }
}